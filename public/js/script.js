$(function() {
  marked.setOptions({
    langPrefix: ""
  });

  $("#editor").keyup(function() {
    var html = marked($(this).val());
    $("#preview").html(html);

    $("#preview pre code").each(function(i, e) {
      hljs.highlightBlock(e, e.className);
    });
  });
});

$(document).on("change", ":file", function() {
  var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input
      .val()
      .replace(/\\/g, "/")
      .replace(/.*\//, "");
  input
    .parent()
    .parent()
    .next(":text")
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
        .prev(".imagePreview")
        .css("background-image", "url(" + this.result + ")");
    };
  }
});

$("#tags").tagsInput({
  height: "90px",
  width: "730px"
});

$(".bswitch").on("click", function() {
  $("#admin-article .switch").hide();
  $("." + this.id).show();
});
