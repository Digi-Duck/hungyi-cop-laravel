var image = document.getElementById('image');
var myWidth = document.getElementById('uploadImg').dataset.mywidth;
var myHeight = document.getElementById('uploadImg').dataset.myheight;
var preview = document.getElementById('preview');
var cropper;
$("body").on("change", ".image", function (e) {
    var files = e.target.files;
    var done = function (url) {
        image.src = url;
        preview.style.display = 'block';
        // cropbtn.style.display = 'block';

        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        cropper = new Cropper(image, {
            aspectRatio: myWidth / myHeight,
            viewMode: 1,
            preview: '.preview'
        });
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

$("#form_submit").click(function (ev) {
    ev.preventDefault();
    if(cropper){
        canvas = cropper.getCroppedCanvas({
            width: myWidth,
            height: myHeight,
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $('#img').val(base64data);
                $('form').submit();
            }
        });
    }
    else{
        $('form').submit();
        // alert('請上傳封面圖片！');
    }
})
