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
            echo (sprintf('<h2 class="entry-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>', esc_url(get_permalink()), get_field('teacher-first-name') . " " . get_field('teacher-last-name')));
            ?>
            <div class="header-btn-group">
              <button class="btn-grey" id="open-contact-modal">Contact</button>

              <?php echo (empty($website) ? 'None' : sprintf('<a class="link-btn-grey btn-grey" href="%1$s" target="_blank" rel="noopener noreferrer">Visit Website</a>', $website)) ?>
            </div>
          </header><!-- .entry-header -->
        </div><!-- .entry-header-wrapper -->

        <div>
          <?php
          $image = get_field('teacher-portrait');
          if (!empty($image)) { ?>
            <img style="object-fit: cover; float: left; width: 350px; height: 350px; margin-right: 25px; margin-bottom: 35px; border: 1px solid black" src="<?php echo (esc_url($image['url'])) ?>" alt="">
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
    <div class="close-contact-modal-container">
      <button class="close-contact-modal" id="close-contact-modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 30 30" aria-hidden="true" tabindex="0" fill="none">
          <g>
            <g>
              <path d="M15 5c.69 0 1.25.56 1.25 1.25v7.5h7.5c.647 0 1.18.492 1.244 1.122L25 15c0 .69-.56 1.25-1.25 1.25h-7.5v7.5c0 .647-.492 1.18-1.122 1.244L15 25c-.69 0-1.25-.56-1.25-1.25v-7.5h-7.5c-.647 0-1.18-.492-1.244-1.122L5 15c0-.69.56-1.25 1.25-1.25h7.5v-7.5c0-.647.492-1.18 1.122-1.244z" transform="translate(-1242 -748) translate(1055 181) rotate(-45 792.93 72.771)" />
            </g>
          </g>
        </svg>
        <span class="sr-only">Close</span>
      </button>
    </div>
    <div class="modal-inner modal-initial" id="modal-initial">
      <h2>Student Guidelines</h2>
      <p>Adapted from the Student Guidelines from the <a href="https://www.spiritual-integrity.org/guidelines/" target="_blank" rel="noopener noreferrer">Association for Spiritual Integrity</a>.</p>
      <ul>
        <li>It is important for students to acknowledge that teachers and students alike are human. Just like students, teachers also develop and grow, both personally and professionally.</li>
        <li>Students should refrain from projecting ideas and emotions they may carry onto their teacher. Students are encouraged to be aware of and take responsibility for any aggrandizing perceptions of a teacher that can sometimes develop.</li>
        <li>Where appropriate, students and teachers are encouraged to approach their communication with an attitude of openness so that any misunderstandings and miscommunication that arise can be worked out.</li>
        <li>If misconduct of any kind occurs, students should reach out to us as soon as possible via our <a href="https://opensanghacollective.org/give-feedback/">feedback</a> page. Ethical grievances are not taboo topics and can and should be openly discussed.</li>
        <li>Students must not make sexual advances towards, or flirt with a teacher.</li>
      </ul>

      <div class="contact-form-container">
        <h2>Request personal instruction</h2>
        <iframe name="hidden_iframe" id="hidden_iframe" style="display: none"></iframe>
        <form action="https://docs.google.com/forms/d/e/1FAIpQLSctB0aA1paitYqrBD136yq8WF1NTYg6qtl4a_gRzY7oIWj6Cw/formResponse" method="post" target="hidden_iframe" onsubmit="validateForm()" id="my-form">
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="guidelines" name="entry.1828477880" />
            <label class="form-check-label" for="guidelines">
              I have read and agree to the Open Sangha Collective's student
              guidelines.
            </label>
          </div>
          <div class="mb-3">
            <label class="form-label instruction-form-label" for="teacher">Teacher</label>
            <input type="text" class="form-control instruction-form-control teacher-control" id="teacher" name="entry.1756842035" value="<?php echo trim("$teacher_firstname") . " " . trim("$teacher_lastname") ?>" readonly />
          </div>
          <div class="row">
            <div class="col-16 col-md-8 mb-3">
              <label class="form-label instruction-form-label" for="name">Name</label>
              <input type="text" class="form-control instruction-form-control" id="name" name="entry.817157306" />
            </div>
            <div class="col-16 col-md-8 mb-3">
              <label class="form-label instruction-form-label" for="email">Email</label>
              <input type="email" class="form-control instruction-form-control" id="email" name="entry.1343967089" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label instruction-form-label" for="name">Message to <?php echo trim("$teacher_firstname") . " " . trim("$teacher_lastname") ?></label>
            <textarea class="form-control instruction-form-control"  id="message" name="entry.1776406539" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
        </form>
      </div>
    </div>
    <div class="modal-inner modal-success modal-hide" id="modal-success">
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
    modalContainer.classList.add("modal-show")
    document.body.classList.add("modal-show")
  })

  closeContactModal.addEventListener("click", () => {
    modalContainer.classList.remove("modal-show")
    document.body.classList.remove("modal-show")
    modalInitial.classList.remove("modal-hide")
    modalSuccess.classList.add("modal-hide")
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
        setTimeout(function() {
          document.getElementById("guidelines").checked = false
          document.getElementById("name").value = ""
          document.getElementById("email").value = ""
          document.getElementById("message").value = ""

          modalInitial.classList.add("modal-hide")
          modalSuccess.classList.remove("modal-hide")

        }, 1000)
      }
      return true
    }
  }
</script>