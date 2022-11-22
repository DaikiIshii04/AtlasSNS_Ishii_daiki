// アコーディオンメニュー
$(function () {
  $('.profile-accordion').on('click', function (e) {
    e.preventDefault();
    $('.profile-accordion').toggleClass('is-active');
    $('.profile-accordion-ul').toggleClass('is-active');

    return false;
  });
  // });
  // $(function () {
  $('.js-modal-open').on('click', function () {
    // モーダル表示
    $('.js-modal').fadeIn();
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');
    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    // モーダルを非表示
    $('.js-modal').fadeOut();
    return false;
  });
});
