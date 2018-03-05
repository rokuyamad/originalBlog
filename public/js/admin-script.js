$(document).on('change', ':file', function() {
  var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input
      .val()
      .replace(/\\/g, '/')
      .replace(/.*\//, '');
  input
    .parent()
    .parent()
    .next(':text')
    .val(label);
  var files = !!this.files ? this.files : [];
  if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
  if (/^image/.test(files[0].type)) {
    // only image file
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file
    reader.onloadend = function() {
      // set image data as background of div
      input
        .parent()
        .parent()
        .parent()
        .prev('.imagePreview')
        .css('background-image', 'url(' + this.result + ')');
    };
  }
});

function dragover(e) {
  e.preventDefault();
}

function drop(e) {
  e.preventDefault();
  var files = e.dataTransfer.files;
  for (var i = 0; i < files.length; i++) {
    if (!files[i] || files[i].type.indexOf('image/') < 0) {
      continue;
    }

    FileUpload(files[i]);
  }
}

function FileUpload(fd) {
  var formData = new FormData();
  formData.append('image', fd);
  $.ajax({
    async: true,
    type: 'post',
    contentType: false,
    processData: false,
    url: '/admin/posts/uploadImage',
    data: formData,
    dataType: 'json',
  })
    .done(function(responsData) {
      console.log(responsData);

      var textarea = document.querySelector('#editor');
      var sentence = textarea.value;
      var len = sentence.length;
      var pos = textarea.selectionStart;

      var before = sentence.substr(0, pos);
      var word = `![sample](/image/postImages/${responsData['fileName']})`;
      var after = sentence.substr(pos, len);

      sentence = before + word + after;
      textarea.value = sentence;
    })
    .fail(function(error) {
      console.log(error);
    });
}
