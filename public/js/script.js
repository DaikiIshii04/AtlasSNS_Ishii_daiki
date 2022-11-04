// アコーディオンメニュー
$(function () {
  $('.accordion-btn').on('click', function () {
    $(this).next().slideToggle();
    $(this).toggleClass("open");
  });
});
$(function () {
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
