/**
 *
 * @param noteBody
 * anything you want to show to user
 * @param styleClass
 * css class
 */
function informNote (noteBody, styleClass = '') {

    $('body').append('<div class="noteBody ' + styleClass + '">' + noteBody + '</div>');

    $('.noteBody').fadeIn();

    setTimeout(function (){
        $('.noteBody').fadeOut();
    }, 3000);
}


