<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
<!-- <script src="path/to/quill.min.js"></script> -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>  
<script src="path/to/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script src="./js/index.js"></script>
<script src="./js/validate.js"></script>
<script src="./js/dark.js"></script>
</body>


</html>
<script>
    ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
    console.error(error);
    });
</script>