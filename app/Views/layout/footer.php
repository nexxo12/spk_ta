<script src="assets/js/jquery.min.js?h=89312d34339dcd686309fe284b3f226f"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/bs-init.js?h=a24a748d1ebf2b30dec97d2c79b26872"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="assets/js/Simple-Slider.js?h=df0233e38c69d965b7833f56606b8826"></script>
<script src="assets/fonts/fontawesome/js/all.min.js"></script>
<script src="assets/js/glider.js"></script>

<!-- script animasi scroll menu nav -->
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>

<script type="text/javascript">
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("nav").style.padding = "10px 10px";
            document.getElementById("logo").style.fontSize = "10px";
            document.getElementById("nav").style.boxShadow = "1px 3px 4px 1px rgba(0,0,0,0.75)";
            document.getElementById("nav").style.transition = "all 0.8s";
            document.getElementById("nav").style.backgroundColor = "white";
            document.getElementById("nav-text").style.color = "black";
            document.getElementById("nav-text2").style.color = "black";
            document.getElementById("nav-text3").style.color = "black";
            document.getElementById("nav-text4").style.color = "black";
            document.getElementById("nav-text").style.fontSize = "medium";
            document.getElementById("nav-text2").style.fontSize = "medium";
            document.getElementById("nav-text3").style.fontSize = "medium";
            document.getElementById("nav-text4").style.fontSize = "medium";

        } else {
            document.getElementById("nav").style.padding = "20px 10px";
            document.getElementById("logo").style.fontSize = "95px";
            document.getElementById("nav").style.boxShadow = "0px 0px 0px 0px rgba(0,0,0,0.75)";
            document.getElementById("nav").style.backgroundColor = "#6ac1e4";
            document.getElementById("nav-text").style.color = "white";
            document.getElementById("nav-text2").style.color = "white";
            document.getElementById("nav-text3").style.color = "white";
            document.getElementById("nav-text4").style.color = "white";
            document.getElementById("nav-text").style.fontSize = "large";
            document.getElementById("nav-text2").style.fontSize = "large";
            document.getElementById("nav-text3").style.fontSize = "large";
            document.getElementById("nav-text4").style.fontSize = "large";

        }
    }
</script>