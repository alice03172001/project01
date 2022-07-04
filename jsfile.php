<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

<!-- 不用這個簡易的，改用下面的 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->

<!-- https://jquery.com/download/     Google CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
<!-- 載入bootstrap JavaScript file -->

<script type="text/javascript" src="./bootstrap-4.6.1-dist/js/jquery.min.js"></script>
    <!-- 載入這個之前要先去把檔案jquery.min.js存到資料夾內才能用 -->


    <script type="text/javascript" src="./bootstrap-4.6.1-dist/js/bootstrap.bundle.js"></script>

<!-- 這3個要依照順序載入，不然無法啟動 -->
    <script type="text/javascript" src="./js/wow.js"></script>
    <script type="text/javascript" src="./js/morphext.js"></script>
    <!-- text_ctrl.js是將文字分開與動態的前animated做成wow的 function -->
    <script type="text/javascript" src="./js/text_ctrl.js"></script>
    
<!-- 設定三層次功能表javascript -->
<script type="text/javascript">
    $(function() {
        $('.dropdown-submenu > a').on("click", function(e) {
            var submenu = $(this);
            $('.dropdown-submenu .dropdown-menu').removeClass('show');
            submenu.next('.dropdown-menu').addClass('show');
            e.stopPropagation();
        });
        $('.dropdown').on("hidden.bs.dropdown", function() {
            //hide any open menus when parent closes
            $('.dropdown-menu.show').removeClass('show');
        });
    });
</script>

<!-- 新增gotop回頂端程式,使用gotop.js -->
<script type="text/javascript" src="./gotop.js"></script>
<!-- 加入購物車 -->
<script type="text/javascript" src="./jslib.js"></script>