'use strict';
    var fakePics = document.getElementById('previewIMG');

    var loadImg = function(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function(e) {
            fakePics.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
        }
    };


    document.querySelector('#titleImgFile').onchange = function() {
        loadImg(this);
    };
