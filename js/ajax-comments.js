(function ($) {
  $(document).ready(function () {
    // Close success message on click
    $(document).on('click', '.close-success-message', function (e) {
      e.preventDefault()
      $(this).closest('.success-message').remove()
    })

    $(document).on('click', '.close-error-message', function (e) {
      e.preventDefault()
      $(this).closest('.system-error').remove()
    })

    function clearCommentForm () {
      $('form#commentform').find("input[type=text], textarea").val("");
    }

    function validateCommentForm () {
      $('form#commentform').find('input, textarea').removeClass('invalid')
      $('form#commentform').find('.error-message').remove()
      $('form#commentform').find('.system-error').remove()

      let validator = window.validator
      var isValid = true
      let requiredItems = $('form#commentform').find('input[aria-required="true"], textarea[aria-required="true"]')

      requiredItems.each(function (index, item) {
        let currentItemInvalid = false
        let invalidMessage = 'Please fill in this field, it is required.'
        let itemValue = $(item).val()

        if ($(item).attr('name') == 'email') {
          if (!validator.isEmail( itemValue ) ) {
            isValid = false
            currentItemInvalid = true
            invalidMessage = 'Please provide a valid email address, it is required.'
          }
        } else {
          if (validator.isEmpty( itemValue ) ) {
            isValid = false
            currentItemInvalid = true
          }
        }

        if (currentItemInvalid) {
          $(item).addClass('invalid')
          $(item).after('<p class="error-message xs-m-b-1">' + invalidMessage + '</p>')
        }
      })

      return isValid
    }

    $('form#commentform').on('submit', function (e) {
      e.preventDefault()

      if (validateCommentForm()) {
        $.ajax({
          url: $(this).attr('action'),
          data: $(this).serialize(),
          method: 'POST',
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR)
            console.log(textStatus)
            console.log(errorThrown)
            $('form#commentform').append($('<div class="system-error"><h6 class="system-message-title">Message Failed to Send</h6><p>Check your internet connection and try again or you might have already submitted this message.</p><button class="close-error-message">×</button></div>'))
          },
          success: function (data, textStatus) {
            clearCommentForm()

            let successMessage = $('<div>').addClass('success-message')
            successMessage.append($('<div>').html('<h6 class="system-message-title">Message Sent</h6><p>Thanks for your question or comment. We\'ll reply to the email address you provided within a few days. If you have questions about your housing court case, please call our Hotline at <a href="tel:1-212-962-4795">212-962-4795</a> on Tuesday, Wednesday, or Thursday between 9am-5pm.</p>'))
            successMessage.append($('<button>').html('&times;').addClass('close-success-message'))

            $('form#commentform').append(successMessage)
          }
        })
      }
    })
  })
})(jQuery)
