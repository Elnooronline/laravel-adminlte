$('input').on('invalid', () => {
  let tabId = $('input:invalid').eq(0).closest('[role=tabpanel]').attr('id');
  $(`a[aria-controls="${tabId}"]`).click();
});