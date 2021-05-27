<?php
/**
 * The default template for displaying content
 *
 * @package Amphibious
 */
?>

<div class="post-wrapper-hentry">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-content-wrapper post-content-wrapper-archive" style="overflow: hidden">

            <?php amphibious_post_thumbnail(); ?>

            <div class="entry-data-wrapper">
                <div class="entry-header-wrapper">
                    <header class="entry-header">
                        <?php
                            $email = get_field('teacher-email');
                            $website = get_field('teacher-website');
                            echo(
                                 sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>', esc_url( get_permalink() ), get_field('teacher-first-name') . " " . get_field('teacher-last-name'))
                            );
                        ?>
                        <div class="header-btn-group">
                            <button class="btn-grey" id="open-contact-modal">Contact</button>

                            <?php echo (empty($website) ? 'None': sprintf('<a class="link-btn-grey btn-grey" href="%1$s" target="_blank" rel="noopener noreferrer">Visit Website</a>', $website)) ?>
                        </div>
                    </header><!-- .entry-header -->
                </div><!-- .entry-header-wrapper -->

                <div>
                    <?php
                    $image = get_field('teacher-portrait');
                    if (!empty($image)) { ?>
                        <img style="object-fit: cover; float: left; width: 350px; height: 350px; margin-right: 25px; margin-bottom: 35px; border: 1px solid black" src="<?php echo(esc_url($image['url'])) ?>" alt="">
                    <?php }
                    ?>
                    <?php the_field('teacher-bio'); ?>
                </div>
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->

<div class="modal-container" id="modal-container">
    <?php
        $teacher_firstname = get_field('teacher-first-name');
        $teacher_lastname = get_field('teacher-last-name');
    ?>
    <div class="modal">
        <button class="close-contact-modal" id="close-contact-modal">Close</button>
        <div class="modal-initial" id="modal-initial">
            <h2>Student Guidelines</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos mollitia debitis soluta molestias eaque modi veniam iure doloremque officia. Nesciunt mollitia asperiores explicabo dicta cumque?</p>
            <ul>
                <li>Make peace</li>
                <li>Be kind</li>
                <li>Be gentle</li>
            </ul>
            
            <div id="contact">
                <div class="form-container">
                    <h2>Request personal instruction</h2>
                    <iframe
                    name="hidden_iframe"
                    id="hidden_iframe"
                    style="display: none"
                    ></iframe>
                    <form
                    action="https://docs.google.com/forms/d/e/1FAIpQLSfmncp3ceQwzH4SLYPoXtbrBgCyvygm2oAPC7tPsDY23feYLg/formResponse"
                    method="post"
                    target="hidden_iframe"
                    onsubmit="validateForm()"
                    id="my-form"
                    >
                    <div class="mb-3 form-check">
                        <input
                        type="checkbox"
                        class="form-check-input"
                        id="guidelines"
                        name="entry.1495443192"
                        />
                        <label class="form-check-label" for="guidelines">
                        I have read and agree to the Open Sangha Collective's student
                        guidelines
                        </label>
                    </div>
                    <div class="mb-3">
                        <input
                        type="text"
                        class="form-control"
                        id="teacher"
                        name="entry.1118404719"
                        value="<?php echo trim("$teacher_firstname") . " " .trim("$teacher_lastname") ?>"
                        aria-label="<?php echo "$teacher_firstname $teacher_lastname" ?>"
                        readonly
                        />
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="entry.1102057729"
                            placeholder="Enter your name"
                            aria-label="Name"
                        />
                        </div>
                        <div class="col">
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Enter your email"
                            id="email"
                            name="entry.1217221383"
                            aria-label="Email"
                        />
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea
                        class="form-control"
                        placeholder="Enter your message to the teacher here."
                        id="message"
                        name="entry.198974391"
                        rows="4"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-success hide" id="modal-success">
            <h2>Thank you!</h2>
            <p>Your request for instruction has been forwarded to <?php echo "$teacher_firstname $teacher_lastname" ?>. We've sent you an email with information about the next steps in making contact.</p>
        </div>
    </div>
</div>

<script>
    // Modal Handling
    const openContactModal = document.getElementById("open-contact-modal")
    const modalContainer = document.getElementById("modal-container")
    const closeContactModal = document.getElementById("close-contact-modal")
    const modalInitial = document.getElementById("modal-initial")
    const modalSuccess = document.getElementById("modal-success")

    openContactModal.addEventListener("click", () => {
        modalContainer.classList.add("show")
    })

    closeContactModal.addEventListener("click", () => {
        modalContainer.classList.remove("show")
        modalInitial.classList.remove("hide")
        modalSuccess.classList.add("hide")
    })

    // Form Handling
    function validateGuidelines() {
        var guidelines = document.getElementById("guidelines")
        if (!guidelines.checked) {
          alert(
            "Please confirm that you have read and agree to our student guidelines."
          )
          return false
        }
        return true
      }

      function validateName() {
        var name = document.getElementById("name").value
        if (name.length == 0) {
          alert("Please enter your name.")
          return false
        }
        return true
      }

      function validateEmail() {
        var email = document.getElementById("email").value
        if (email.length == 0) {
          alert("Email can't be blank") //TODO: Validation Message
          return false
        }

        if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
          alert("Please enter a correct email address") //TODO: Validation Message
          return false
        }

        return true
      }

      function validateMessage() {
        var teacher = document.getElementById("teacher").value
        var message = document.getElementById("message").value
        if (message.length == 0) {
          alert(`Please enter your message to ${teacher}.`) //TODO: Validation Message
          return false
        }

        return true
      }

      function validateForm() {
        if (
          !validateGuidelines() ||
          !validateName() ||
          !validateEmail() ||
          !validateMessage()
        ) {
          return false
        } else {
          // set the target on the form to point to a hidden iframe

          document.getElementById("my-form").target = "hidden_iframe"
          // detect when the iframe reloads
          const iframe = document.getElementById("hidden_iframe")
          if (iframe) {
            setTimeout(function () {
              document.getElementById("guidelines").checked = false
              document.getElementById("name").value = ""
              document.getElementById("email").value = ""
              document.getElementById("message").value = ""

              modalInitial.classList.add("hide")
              modalSuccess.classList.remove("hide")

            }, 1000)
          }
          return true
        }
      } 
</script>