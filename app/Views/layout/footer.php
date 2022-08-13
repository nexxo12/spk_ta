<script src="assets/js/jquery.min.js?h=89312d34339dcd686309fe284b3f226f"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->
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

    function modalshow() {
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            keyboard: false,
            backdrop: 'static',

        })
        myModal.show()
    }

    function loadlist_items() {
        $.ajax({
            type: "POST",
            url: '<?= base_url(); ?>/fuzzyC/showitems',
            data: 'itemID=' + $('input[name=itemID]').val(),
            dataType: "JSON",
            success: function(result) {
                var html = '';
                for (var i = 0; i < result.length; i++) {
                    var no = parseInt(i);
                    var price = result[i].item_PRICE;
                    var outmamdani = result[i].item_OutMamdani;
                    var outsugeno = result[i].item_OutSugeno;
                    let idr_price = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(price);
                    let idr_mamdani = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(outmamdani);
                    let idr_sugeno = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(outsugeno);
                    no++;
                    html += '<tr>' +
                        '<th scope="row">' + no + '</th>' +
                        '<td>' + result[i].NAMA_BARANG + '</td>' +
                        '<td>' + idr_price + '</td>' +
                        '<td>' + result[i].item_USE + ' Tahun </td>' +
                        '<td>' + idr_mamdani + '</td><td></td>' +
                        '<td>' + idr_sugeno + '</td>' +
                        +'</tr>';
                }
                $('#data-itemlist').html(html);


            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }


        })
        //MENAMPILKAN GTOTAL HARGA BELI
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>/fuzzyC/gtotal_pricebuy',
            dataType: "JSON",
            data: 'itemID=' + $('input[name=itemID]').val(),
            success: function(result) {
                for (var i = 0; i < result.length; i++) {
                    var gtotal_price = result[i].item_PRICE
                    let idr_price = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(gtotal_price);
                    $("#gtotal_buy").val(idr_price);

                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        });
        //MENAMPILKAN GTOTAL HARGA MAMDANI
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>/fuzzyC/gtotal_pricemamdani',
            dataType: "JSON",
            data: 'itemID=' + $('input[name=itemID]').val(),
            success: function(result) {
                for (var i = 0; i < result.length; i++) {
                    var gtotal_priceM = result[i].item_OutMamdani
                    idr_priceM = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(gtotal_priceM);
                    $("#gtotal_mamdani").val(idr_priceM);

                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        });
        //MENAMPILKAN GTOTAL HARGA SUGENO
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>/fuzzyC/gtotal_pricesugeno',
            dataType: "JSON",
            data: 'itemID=' + $('input[name=itemID]').val(),
            success: function(result) {
                for (var i = 0; i < result.length; i++) {
                    var gtotal_priceS = result[i].item_OutSugeno
                    idr_priceS = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(gtotal_priceS);
                    $("#gtotal_sugeno").val(idr_priceS);

                }
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        });
    }

    function delete_list() {
        $(".hitung-ulang").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr('href'), //data dikirim dari a href
                dataType: "JSON",
                success: function() {

                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            })
        })
    }
</script>

<!-- ########################menghitung fuzzy################### -->
<script>
    // membuat template fungsi kurva turun
    var linier_turun = function(ba, bb) {
        this.a = ba;
        this.b = bb;
        this.u = function(x) {
            var a = this.a;
            var b = this.b;
            var y = 0;
            if ((x < a)) y = 1;
            else if ((x >= a) && (x <= b)) y = (b - x) / (b - a);
            else if ((x > b)) y = 0;
            return y;
        }
    }
    //membuat template fungsi kurva naik
    var linier_naik = function(ba, bb) {
        this.a = ba;
        this.b = bb;
        this.u = function(x) {
            var a = this.a;
            var b = this.b;
            var y = 0;
            if ((x < a)) y = 0;
            else if ((x >= a) && (x <= b)) y = (x - a) / (b - a);
            else if ((x > b)) y = 1;
            return y;
        }
    }
    //membuat template fungsi kurva segitiga
    var segitiga = function(ba, bb, bt) {
        this.a = ba;
        this.b = bb;
        this.c = bt;
        this.u = function(x) {
            var a = this.a;
            var b = this.b;
            var c = this.c;
            var y = 0;
            if ((x < a) || (x > c)) y = 0;
            else if ((x >= a) && (x <= b)) y = (x - a) / (b - a);
            else if ((x > b) && (x <= c)) y = (c - x) / (c - b);
            return y;
        }
    }
    // ######### end template kurva ###########

    //#########menentukan anggota harga processor start###########
    function mf_HargaProc(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah": murah.u(x),
            "mahal": mahal.u(x),
        };
    }
    //anggota pemakaian processor
    function mf_UseProc(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY": oneY.u(x),
            "twoY": twoY.u(x),
            "threeY": threeY.u(x)
        };
    }
    //anggota output harga processor
    function mf_outHargaProc(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah": murah.u(x),
            "mahal": mahal.u(x)
        };
    }

    function mf_outHargaProc_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // #################end processor ##############
    // --------------------------------------------------------------------------

    // ###########menentukan member function mobo #######
    function mf_HargaMb(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_mb": murah.u(x),
            "mahal_mb": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UseMB(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_mb": oneY.u(x),
            "twoY_mb": twoY.u(x),
            "threeY_mb": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaMb(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_mb": murah.u(x),
            "mahal_mb": mahal.u(x)
        };
    }

    function mf_outHargaMb_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // #################end motherboard ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION RAM MEMORY #######
    function mf_HargaRAM(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_ram": murah.u(x),
            "mahal_ram": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UseRAM(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_ram": oneY.u(x),
            "twoY_ram": twoY.u(x),
            "threeY_ram": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaRAM(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_ram": murah.u(x),
            "mahal_ram": mahal.u(x)
        };
    }

    function mf_outHargaRAM_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // ################# END RAM MEMORY ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION SSD #######
    function mf_HargaSSD(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_ssd": murah.u(x),
            "mahal_ssd": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UseSSD(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_ssd": oneY.u(x),
            "twoY_ssd": twoY.u(x),
            "threeY_ssd": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaSSD(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_ssd": murah.u(x),
            "mahal_ssd": mahal.u(x)
        };
    }

    function mf_outHargaSSD_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // ################# END SSD ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION HDD #######
    function mf_HargaHDD(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_hdd": murah.u(x),
            "mahal_hdd": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UseHDD(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_hdd": oneY.u(x),
            "twoY_hdd": twoY.u(x),
            "threeY_hdd": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaHDD(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_hdd": murah.u(x),
            "mahal_hdd": mahal.u(x)
        };
    }

    function mf_outHargaHDD_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // ################# END HDD ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION VGA #######
    function mf_HargaVGA(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_vga": murah.u(x),
            "mahal_vga": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UseVGA(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_vga": oneY.u(x),
            "twoY_vga": twoY.u(x),
            "threeY_vga": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaVGA(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_vga": murah.u(x),
            "mahal_vga": mahal.u(x)
        };
    }

    function mf_outHargaVGA_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // ################# END VGA ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION PSU #######
    function mf_HargaPSU(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_psu": murah.u(x),
            "mahal_psu": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UsePSU(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_psu": oneY.u(x),
            "twoY_psu": twoY.u(x),
            "threeY_psu": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaPSU(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_psu": murah.u(x),
            "mahal_psu": mahal.u(x)
        };
    }

    function mf_outHargaPSU_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // ################# END PSU ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION CASING #######
    function mf_HargaCASE(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah_case": murah.u(x),
            "mahal_case": mahal.u(x),
        };
    }
    //anggota pemakaian
    function mf_UseCASE(x) {
        var oneY = new linier_turun(0.1, 1);
        var twoY = new segitiga(0.1, 1, 2);
        var threeY = new linier_naik(1, 2.7);
        return {
            "oneY_case": oneY.u(x),
            "twoY_case": twoY.u(x),
            "threeY_case": threeY.u(x)
        };
    }
    //anggota output harga
    function mf_outHargaCASE(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah_case": murah.u(x),
            "mahal_case": mahal.u(x)
        };
    }

    function mf_outHargaCASE_sugeno() {
        return {
            "murah": 100,
            "mahal": 600
        };
    }
    // ################# END CASING ##############
    // --------------------------------------------------------------------------


    //################# INFERENSI PROC #########################
    function fmin(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI MOBO #####################
    function fmin_mb(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_mb(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_mb(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI RAM MEMORY #####################
    function fmin_ram(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_ram(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_ram(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI SSD #####################
    function fmin_ssd(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_ssd(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_ssd(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI HDD #####################
    function fmin_hdd(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_hdd(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_hdd(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI VGA #####################
    function fmin_vga(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_vga(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_vga(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI PSU #####################
    function fmin_psu(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_psu(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_psu(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }

    //################ INFERENSI CASE #####################
    function fmin_case(a, b) {
        return Math.min(a, b);
    }
    //inferensi lanjutan
    function fmax_case(arr) {
        var a = 0;
        for (var i in arr) {
            a = Math.max(a, arr[i]);
        }
        return a;
    }

    function fmaxmin_case(a, b, c, d) {
        return Math.max(Math.min(a, b), Math.min(c, d));
    }


    $("#hitung").click(function(e) {
        e.preventDefault();
        //input price proc
        var hg_proc = parseFloat($("#hg_proc").val());
        var useProc = parseFloat($("#use_proc").val());

        var hg_mb = parseFloat($("#hg_mb").val());
        var usemb = parseFloat($("#use_mb").val());

        var hg_ram = parseFloat($("#hg_ram").val());
        var useram = parseFloat($("#use_ram").val());

        var hg_ssd = parseFloat($("#hg_ssd").val());
        var usessd = parseFloat($("#use_ssd").val());

        var hg_hdd = parseFloat($("#hg_hdd").val());
        var usehdd = parseFloat($("#use_hdd").val());

        var hg_vga = parseFloat($("#hg_vga").val());
        var usevga = parseFloat($("#use_vga").val());

        var hg_psu = parseFloat($("#hg_psu").val());
        var usepsu = parseFloat($("#use_psu").val());

        var hg_case = parseFloat($("#hg_case").val());
        var usecase = parseFloat($("#use_case").val());

        if (hg_proc || hg_mb || hg_ram || hg_ssd || hg_hdd || hg_vga || hg_psu || hg_case < 10000000) {
            //@@@@@@@@ INPUTAN PROCESSOR @@@@@@@
            var hg_proc2 = hg_proc.toString(); // convert string
            var hg_proc3 = hg_proc2.substring(0, 3); //diambil 3 digit (sesuai parameter kurva)
            hg_proc_rp = parseFloat(hg_proc3);
            console.log('harga proc : ' + hg_proc_rp);
            hg_proc = mf_HargaProc(hg_proc_rp);
            console.log(hg_proc);

            //@@@@@@@@ INPUTAN MOTHERBOARD @@@@@@@
            var hg_mb2 = hg_mb.toString();
            var hg_mb3 = hg_mb2.substring(0, 3);
            hg_mb_rp = parseFloat(hg_mb3);
            console.log('harga mb : ' + hg_mb_rp);
            hg_mb = mf_HargaMb(hg_mb_rp);
            console.log(hg_mb);

            //@@@@@@@@ INPUTAN RAM MEMORY @@@@@@@
            var hg_ram2 = hg_ram.toString();
            var hg_ram3 = hg_ram2.substring(0, 3);
            hg_ram_rp = parseFloat(hg_ram3);
            console.log('harga ram : ' + hg_ram_rp);
            hg_ram = mf_HargaRAM(hg_ram_rp);
            console.log(hg_ram);

            //@@@@@@@@ INPUTAN SSD @@@@@@@
            var hg_ssd2 = hg_ssd.toString();
            var hg_ssd3 = hg_ssd2.substring(0, 3);
            hg_ssd_rp = parseFloat(hg_ssd3);
            console.log('harga ssd : ' + hg_ssd_rp);
            hg_ssd = mf_HargaSSD(hg_ssd_rp);
            console.log(hg_ssd);

            //@@@@@@@@ INPUTAN HDD @@@@@@@
            var hg_hdd2 = hg_hdd.toString();
            var hg_hdd3 = hg_hdd2.substring(0, 3);
            hg_hdd_rp = parseFloat(hg_hdd3);
            console.log('harga hdd : ' + hg_hdd_rp);
            hg_hdd = mf_HargaHDD(hg_hdd_rp);
            console.log(hg_hdd);

            //@@@@@@@@ INPUTAN VGA @@@@@@@
            var hg_vga2 = hg_vga.toString();
            var hg_vga3 = hg_vga2.substring(0, 3);
            hg_vga_rp = parseFloat(hg_vga3);
            console.log('harga vga : ' + hg_vga_rp);
            hg_vga = mf_HargaVGA(hg_vga_rp);
            console.log(hg_vga);

            //@@@@@@@@ INPUTAN PSU @@@@@@@
            var hg_psu2 = hg_psu.toString();
            var hg_psu3 = hg_psu2.substring(0, 3);
            hg_psu_rp = parseFloat(hg_psu3);
            console.log('harga psu : ' + hg_psu_rp);
            hg_psu = mf_HargaPSU(hg_psu_rp);
            console.log(hg_psu);

            //@@@@@@@@ INPUTAN PSU @@@@@@@
            var hg_case2 = hg_case.toString();
            var hg_case3 = hg_case2.substring(0, 3);
            hg_case_rp = parseFloat(hg_case3);
            console.log('harga case : ' + hg_case_rp);
            hg_case = mf_HargaCASE(hg_case_rp);
            console.log(hg_case);

        } else {
            console.log('harga proc : ' + hg_proc);
            hg_proc = mf_HargaProc(hg_proc);
            console.log(hg_proc);

            console.log('harga mb : ' + hg_mb);
            hg_mb = mf_HargaMb(hg_mb);
            console.log(hg_mb);

            console.log('harga ram : ' + hg_ram);
            hg_ram = mf_HargaRAM(hg_ram);
            console.log(hg_ram);

            console.log('harga ssd : ' + hg_ssd);
            hg_ssd = mf_HargaSSD(hg_ssd);
            console.log(hg_ssd);

            console.log('harga hdd : ' + hg_hdd);
            hg_hdd = mf_HargaHDD(hg_hdd);
            console.log(hg_hdd);

            console.log('harga vga : ' + hg_vga);
            hg_vga = mf_HargaVGA(hg_vga);
            console.log(hg_vga);

            console.log('harga psu : ' + hg_psu);
            hg_psu = mf_HargaPSU(hg_psu);
            console.log(hg_psu);

            console.log('harga case : ' + hg_case);
            hg_case = mf_HargaCASE(hg_case);
            console.log(hg_case);
        }


        //input pemakaian
        console.log('pemakaian proc : ' + useProc);
        useProc = mf_UseProc(useProc);
        console.log(useProc);

        console.log('pemakaian mb : ' + usemb);
        usemb = mf_UseMB(usemb);
        console.log(usemb);

        console.log('pemakaian ram : ' + useram);
        useram = mf_UseRAM(useram);
        console.log(useram);

        console.log('pemakaian ssd : ' + usessd);
        usessd = mf_UseSSD(usessd);
        console.log(usessd);

        console.log('pemakaian hdd : ' + usehdd);
        usehdd = mf_UseHDD(usehdd);
        console.log(usehdd);

        console.log('pemakaian vga : ' + usevga);
        usevga = mf_UseVGA(usevga);
        console.log(usevga);

        console.log('pemakaian psu : ' + usepsu);
        usepsu = mf_UsePSU(usepsu);
        console.log(usepsu);

        console.log('pemakaian case : ' + usecase);
        usecase = mf_UseCASE(usecase);
        console.log(usecase);


        // ####### RULES PROCESSOR ########
        var murah = [];
        var mahal = [];
        murah.push(fmin(hg_proc.murah, useProc.oneY));
        murah.push(fmin(hg_proc.murah, useProc.twoY));
        murah.push(fmin(hg_proc.murah, useProc.threeY));
        mahal.push(fmin(hg_proc.mahal, useProc.oneY));
        mahal.push(fmin(hg_proc.mahal, useProc.twoY));
        mahal.push(fmin(hg_proc.mahal, useProc.threeY));
        murah = fmax(murah);
        mahal = fmax(mahal);

        // ####### RULES MOTHERBOARD ########
        var murahmb = [];
        var mahalmb = [];
        murahmb.push(fmin_mb(hg_mb.murah_mb, usemb.oneY_mb));
        murahmb.push(fmin_mb(hg_mb.murah_mb, usemb.twoY_mb));
        murahmb.push(fmin_mb(hg_mb.murah_mb, usemb.threeY_mb));
        mahalmb.push(fmin_mb(hg_mb.mahal_mb, usemb.oneY_mb));
        mahalmb.push(fmin_mb(hg_mb.mahal_mb, usemb.twoY_mb));
        mahalmb.push(fmin_mb(hg_mb.mahal_mb, usemb.threeY_mb));
        murah_mb = fmax_mb(murahmb);
        mahal_mb = fmax_mb(mahalmb);

        // ####### RULES RAM MEMOERY ########
        var murahram = [];
        var mahalram = [];
        murahram.push(fmin_ram(hg_ram.murah_ram, useram.oneY_ram));
        murahram.push(fmin_ram(hg_ram.murah_ram, useram.twoY_ram));
        murahram.push(fmin_ram(hg_ram.murah_ram, useram.threeY_ram));
        mahalram.push(fmin_ram(hg_ram.mahal_ram, useram.oneY_ram));
        mahalram.push(fmin_ram(hg_ram.mahal_ram, useram.twoY_ram));
        mahalram.push(fmin_ram(hg_ram.mahal_ram, useram.threeY_ram));
        murah_ram = fmax_ram(murahram);
        mahal_ram = fmax_ram(mahalram);

        // ####### RULES SSD ########
        var murahssd = [];
        var mahalssd = [];
        murahssd.push(fmin_ssd(hg_ssd.murah_ssd, usessd.oneY_ssd));
        murahssd.push(fmin_ssd(hg_ssd.murah_ssd, usessd.twoY_ssd));
        murahssd.push(fmin_ssd(hg_ssd.murah_ssd, usessd.threeY_ssd));
        mahalssd.push(fmin_ssd(hg_ssd.mahal_ssd, usessd.oneY_ssd));
        mahalssd.push(fmin_ssd(hg_ssd.mahal_ssd, usessd.twoY_ssd));
        mahalssd.push(fmin_ssd(hg_ssd.mahal_ssd, usessd.threeY_ssd));
        murah_ssd = fmax_ssd(murahssd);
        mahal_ssd = fmax_ssd(mahalssd);

        // ####### RULES HDD ########
        var murahhdd = [];
        var mahalhdd = [];
        murahhdd.push(fmin_hdd(hg_hdd.murah_hdd, usehdd.oneY_hdd));
        murahhdd.push(fmin_hdd(hg_hdd.murah_hdd, usehdd.twoY_hdd));
        murahhdd.push(fmin_hdd(hg_hdd.murah_hdd, usehdd.threeY_hdd));
        mahalhdd.push(fmin_hdd(hg_hdd.mahal_hdd, usehdd.oneY_hdd));
        mahalhdd.push(fmin_hdd(hg_hdd.mahal_hdd, usehdd.twoY_hdd));
        mahalhdd.push(fmin_hdd(hg_hdd.mahal_hdd, usehdd.threeY_hdd));
        murah_hdd = fmax_hdd(murahhdd);
        mahal_hdd = fmax_hdd(mahalhdd);

        // ####### RULES VGA ########
        var murahvga = [];
        var mahalvga = [];
        murahvga.push(fmin_vga(hg_vga.murah_vga, usevga.oneY_vga));
        murahvga.push(fmin_vga(hg_vga.murah_vga, usevga.twoY_vga));
        murahvga.push(fmin_vga(hg_vga.murah_vga, usevga.threeY_vga));
        mahalvga.push(fmin_vga(hg_vga.mahal_vga, usevga.oneY_vga));
        mahalvga.push(fmin_vga(hg_vga.mahal_vga, usevga.twoY_vga));
        mahalvga.push(fmin_vga(hg_vga.mahal_vga, usevga.threeY_vga));
        murah_vga = fmax_vga(murahvga);
        mahal_vga = fmax_vga(mahalvga);

        // ####### RULES PSU ########
        var murahpsu = [];
        var mahalpsu = [];
        murahpsu.push(fmin_psu(hg_psu.murah_psu, usepsu.oneY_psu));
        murahpsu.push(fmin_psu(hg_psu.murah_psu, usepsu.twoY_psu));
        murahpsu.push(fmin_psu(hg_psu.murah_psu, usepsu.threeY_psu));
        mahalpsu.push(fmin_psu(hg_psu.mahal_psu, usepsu.oneY_psu));
        mahalpsu.push(fmin_psu(hg_psu.mahal_psu, usepsu.twoY_psu));
        mahalpsu.push(fmin_psu(hg_psu.mahal_psu, usepsu.threeY_psu));
        murah_psu = fmax_psu(murahpsu);
        mahal_psu = fmax_psu(mahalpsu);

        // ####### RULES CASING ########
        var murahcase = [];
        var mahalcase = [];
        murahcase.push(fmin_case(hg_case.murah_case, usecase.oneY_case));
        murahcase.push(fmin_case(hg_case.murah_case, usecase.twoY_case));
        murahcase.push(fmin_case(hg_case.murah_case, usecase.threeY_case));
        mahalcase.push(fmin_case(hg_case.mahal_case, usecase.oneY_case));
        mahalcase.push(fmin_case(hg_case.mahal_case, usecase.twoY_case));
        mahalcase.push(fmin_case(hg_case.mahal_case, usecase.threeY_case));
        murah_case = fmax_case(murahcase);
        mahal_case = fmax_case(mahalcase);

        //######### DEFUZZYFIKASI PROCESSOR MAMDANI ############
        var sa = 0;
        var sb = 0;
        var aa = 100;
        for (var i = aa; i <= 600; i += aa) { //batas atas, batas bawah
            hargaout = mf_outHargaProc(i);
            c = fmaxmin(hargaout.murah, murah, hargaout.mahal, mahal);
            sa += i * c;
            sb += c;
            // console.log('hasil c : ' + c);
            // console.log('hasil sa : ' + sa);
            // console.log('hasil sb : ' + sb);
        }

        var mm = sa / sb;
        var mmRound = Math.round(mm); //bilangan dibulatkan
        var hg_proc2 = parseFloat($("#hg_proc").val());
        var useProc2 = parseFloat($("#use_proc").val());
        var convert = mm * 10000;
        var rupiah = Math.round(convert);

        //######### DEFUZZYFIKASI PROCESSOR SUGENO ############
        outproc = mf_outHargaProc_sugeno();
        var sprc = (outproc.murah * murah) + (outproc.mahal * mahal);
        sprc = sprc / (murah + mahal);
        var hg_procSG = parseFloat($("#hg_proc").val());
        if (hg_procSG < 1000000) {
            g_sprc = Math.round(sprc * 1000);
            console.log('out sugeno proc : ' + g_sprc);
            $("#sell_procsg").val(g_sprc);
        } else {
            g_sprc = Math.round(sprc * 10000);
            console.log('out sugeno proc : ' + g_sprc);
            $("#sell_procsg").val(g_sprc);
        }


        //######### DEFUZZYFIKASI MOTHERBOARD MAMDANI ############
        var sa_mb = 0;
        var sb_mb = 0;
        var aa_mb = 100;
        for (var i = aa_mb; i <= 600; i += aa_mb) {
            hargaoutmb = mf_outHargaMb(i);
            c = fmaxmin_mb(hargaoutmb.murah_mb, murah_mb, hargaoutmb.mahal_mb, mahal_mb); //(v.objek, v[array])
            sa_mb += i * c;
            sb_mb += c;
        }
        var df_mb = sa_mb / sb_mb;
        var dfmbRound = Math.round(df_mb); //bilangan dibulatkan
        var hg_mb2 = parseFloat($("#hg_mb").val());
        var usemb2 = parseFloat($("#use_mb").val());
        var convert_mb = df_mb * 10000;
        var rupiah_mb = Math.round(convert_mb);

        //######### DEFUZZYFIKASI MOTHERBOARD SUGENO ############
        outmb = mf_outHargaMb_sugeno();
        var smobo = (outmb.murah * murah_mb) + (outmb.mahal * mahal_mb);
        smobo = smobo / (murah_mb + mahal_mb);
        var hg_mbSG = parseFloat($("#hg_mb").val());
        if (hg_mbSG < 1000000) {
            g_smobo = Math.round(smobo * 1000);
            console.log('out sugeno mobo : ' + g_smobo);
            $("#sell_mbsg").val(g_smobo);
        } else {
            g_smobo = Math.round(smobo * 10000);
            console.log('out sugeno mobo : ' + g_smobo);
            $("#sell_mbsg").val(g_smobo);
        }

        //######### DEFUZZYFIKASI RAM MEMORY MAMDANI ############
        var sa_ram = 0;
        var sb_ram = 0;
        var aa_ram = 100;
        for (var i = aa_ram; i <= 600; i += aa_ram) {
            hargaoutram = mf_outHargaRAM(i);
            c = fmaxmin_ram(hargaoutram.murah_ram, murah_ram, hargaoutram.mahal_ram, mahal_ram); //(v.objek, v[array])
            sa_ram += i * c;
            sb_ram += c;
        }
        var df_ram = sa_ram / sb_ram;
        var dframRound = Math.round(df_ram); //bilangan dibulatkan
        var hg_ram2 = parseFloat($("#hg_ram").val());
        var useram2 = parseFloat($("#use_ram").val());
        var convert_ram = df_ram * 10000;
        var rupiah_ram = Math.round(convert_ram);

        //######### DEFUZZYFIKASI MEMORY RAM SUGENO ############
        outram = mf_outHargaRAM_sugeno();
        var sram = (outram.murah * murah_ram) + (outram.mahal * mahal_ram);
        sram = sram / (murah_ram + mahal_ram);
        var hg_ramSG = parseFloat($("#hg_ram").val());
        if (hg_ramSG < 1000000) {
            g_sram = Math.round(sram * 1000);
            console.log('out sugeno ram : ' + g_sram);
            $("#sell_ramsg").val(g_sram);
        } else {
            g_sram = Math.round(sram * 10000);
            console.log('out sugeno ram : ' + g_sram);
            $("#sell_ramsg").val(g_sram);
        }

        //######### DEFUZZYFIKASI SSD MAMDANI ############
        var sa_ssd = 0;
        var sb_ssd = 0;
        var aa_ssd = 100;
        for (var i = aa_ssd; i <= 600; i += aa_ssd) {
            hargaoutssd = mf_outHargaSSD(i);
            c = fmaxmin_ssd(hargaoutssd.murah_ssd, murah_ssd, hargaoutssd.mahal_ssd, mahal_ssd); //(v.objek, v[array])
            sa_ssd += i * c;
            sb_ssd += c;
        }
        var df_ssd = sa_ssd / sb_ssd;
        var dfssdRound = Math.round(df_ssd); //bilangan dibulatkan
        var hg_ssd2 = parseFloat($("#hg_ssd").val());
        var usessd2 = parseFloat($("#use_ssd").val());
        var convert_ssd = df_ssd * 10000;
        var rupiah_ssd = Math.round(convert_ssd);

        //######### DEFUZZYFIKASI SSD SUGENO ############
        outssd = mf_outHargaSSD_sugeno();
        var sssd = (outssd.murah * murah_ssd) + (outssd.mahal * mahal_ssd);
        sssd = sssd / (murah_ssd + mahal_ssd);
        var hg_ssdSG = parseFloat($("#hg_ssd").val());
        if (hg_ssdSG < 1000000) {
            g_sssd = Math.round(sssd * 1000);
            console.log('out sugeno ssd : ' + g_sssd);
            $("#sell_ssdsg").val(g_sssd);
        } else {
            g_sssd = Math.round(sssd * 10000);
            console.log('out sugeno ssd : ' + g_sssd);
            $("#sell_ssdsg").val(g_sssd);
        }

        //######### DEFUZZYFIKASI HDD MAMDANI ############
        var sa_hdd = 0;
        var sb_hdd = 0;
        var aa_hdd = 100;
        for (var i = aa_hdd; i <= 600; i += aa_hdd) {
            hargaouthdd = mf_outHargaHDD(i);
            c = fmaxmin_hdd(hargaouthdd.murah_hdd, murah_hdd, hargaouthdd.mahal_hdd, mahal_hdd); //(v.objek, v[array])
            sa_hdd += i * c;
            sb_hdd += c;
        }
        var df_hdd = sa_hdd / sb_hdd;
        var dfhddRound = Math.round(df_hdd); //bilangan dibulatkan
        var hg_hdd2 = parseFloat($("#hg_hdd").val());
        var usehdd2 = parseFloat($("#use_hdd").val());
        var convert_hdd = df_hdd * 10000;
        var rupiah_hdd = Math.round(convert_hdd);

        //######### DEFUZZYFIKASI HDD SUGENO ############
        outhdd = mf_outHargaHDD_sugeno();
        var shdd = (outhdd.murah * murah_hdd) + (outhdd.mahal * mahal_hdd);
        shdd = shdd / (murah_hdd + mahal_hdd);
        var hg_hddSG = parseFloat($("#hg_hdd").val());
        if (hg_hddSG < 1000000) {
            g_shdd = Math.round(shdd * 1000);
            console.log('out sugeno hdd : ' + g_shdd);
            $("#sell_hddsg").val(g_shdd);
        } else {
            g_shdd = Math.round(shdd * 10000);
            console.log('out sugeno hdd : ' + g_shdd);
            $("#sell_hddsg").val(g_shdd);
        }

        //######### DEFUZZYFIKASI VGA MAMDANI ############
        var sa_vga = 0;
        var sb_vga = 0;
        var aa_vga = 100;
        for (var i = aa_vga; i <= 600; i += aa_vga) {
            hargaoutvga = mf_outHargaVGA(i);
            c = fmaxmin_vga(hargaoutvga.murah_vga, murah_vga, hargaoutvga.mahal_vga, mahal_vga); //(v.objek, v[array])
            sa_vga += i * c;
            sb_vga += c;
        }
        var df_vga = sa_vga / sb_vga;
        var dfvgaRound = Math.round(df_vga); //bilangan dibulatkan
        var hg_vga2 = parseFloat($("#hg_vga").val());
        var usevga2 = parseFloat($("#use_vga").val());
        var convert_vga = df_vga * 10000;
        var rupiah_vga = Math.round(convert_vga);

        //######### DEFUZZYFIKASI VGA SUGENO ############
        outvga = mf_outHargaVGA_sugeno();
        var svga = (outvga.murah * murah_vga) + (outvga.mahal * mahal_vga);
        svga = svga / (murah_vga + mahal_vga);
        var hg_vgaSG = parseFloat($("#hg_vga").val());
        if (hg_vgaSG < 1000000) {
            g_svga = Math.round(svga * 1000);
            console.log('out sugeno vga : ' + g_svga);
            $("#sell_vgasg").val(g_svga);
        } else {
            g_svga = Math.round(svga * 10000);
            console.log('out sugeno vga : ' + g_svga);
            $("#sell_vgasg").val(g_svga);
        }

        //######### DEFUZZYFIKASI PSU MAMDANI ############
        var sa_psu = 0;
        var sb_psu = 0;
        var aa_psu = 100;
        for (var i = aa_psu; i <= 600; i += aa_psu) {
            hargaoutpsu = mf_outHargaPSU(i);
            c = fmaxmin_psu(hargaoutpsu.murah_psu, murah_psu, hargaoutpsu.mahal_psu, mahal_psu); //(v.objek, v[array])
            sa_psu += i * c;
            sb_psu += c;
        }
        var df_psu = sa_psu / sb_psu;
        var dfpsuRound = Math.round(df_psu); //bilangan dibulatkan
        var hg_psu2 = parseFloat($("#hg_psu").val());
        var usepsu2 = parseFloat($("#use_psu").val());
        var convert_psu = df_psu * 10000;
        var rupiah_psu = Math.round(convert_psu);

        //######### DEFUZZYFIKASI PSU SUGENO ############
        outpsu = mf_outHargaPSU_sugeno();
        var spsu = (outpsu.murah * murah_psu) + (outpsu.mahal * mahal_psu);
        spsu = spsu / (murah_psu + mahal_psu);
        var hg_psuSG = parseFloat($("#hg_psu").val());
        if (hg_psuSG < 1000000) {
            g_spsu = Math.round(spsu * 1000);
            console.log('out sugeno psu : ' + g_spsu);
            $("#sell_psusg").val(g_spsu);
        } else {
            g_spsu = Math.round(spsu * 10000);
            console.log('out sugeno psu : ' + g_spsu);
            $("#sell_psusg").val(g_spsu);
        }

        //######### DEFUZZYFIKASI CASING MAMDANI ############
        var sa_case = 0;
        var sb_case = 0;
        var aa_case = 100;
        for (var i = aa_case; i <= 600; i += aa_case) {
            hargaoutcase = mf_outHargaCASE(i);
            c = fmaxmin_case(hargaoutcase.murah_case, murah_case, hargaoutcase.mahal_case, mahal_case); //(v.objek, v[array])
            sa_case += i * c;
            sb_case += c;
        }
        var df_case = sa_case / sb_case;
        var dfcaseRound = Math.round(df_case); //bilangan dibulatkan
        var hg_case2 = parseFloat($("#hg_case").val());
        var usecase2 = parseFloat($("#use_case").val());
        var convert_case = df_case * 10000;
        var rupiah_case = Math.round(convert_case);

        //######### DEFUZZYFIKASI CASING SUGENO ############
        outcase = mf_outHargaCASE_sugeno();
        var scase = (outcase.murah * murah_case) + (outcase.mahal * mahal_case);
        scase = scase / (murah_case + mahal_case);
        var hg_caseSG = parseFloat($("#hg_case").val());
        if (hg_caseSG < 1000000) {
            g_scase = Math.round(scase * 1000);
            console.log('out sugeno case : ' + g_scase);
            $("#sell_casesg").val(g_scase);
        } else {
            g_scase = Math.round(scase * 10000);
            console.log('out sugeno case : ' + g_scase);
            $("#sell_casesg").val(g_scase);
        }


        //===============================================================================================

        // ############ OUTPUT DEFUZZYFIKASI PROCESSOR #############
        if (mmRound >= hg_proc_rp) {
            var hasil = hg_proc_rp - mmRound;
            var hasil2 = hasil * useProc2;
            var finalresult = hasil2 + mmRound; //hasil akhir dibawah 3jt
            // console.log('input : ' + hg_proc_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + mmRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_proc2 >= 1000000) {
                var sp = Math.round(finalresult * 10000);
                if (sp < 0) {
                    var sp_r = sp * -1;
                    console.log('output proc mamdanii : ' + sp_r);
                    $("#sell_proc").val(sp_r);
                } else {
                    console.log('output proc mamdanii : ' + sp);
                    $("#sell_proc").val(sp);
                }


            } else {
                $("#sell_proc").val(Math.round(finalresult * 1000));
                console.log('output proc mamdanii : ' + finalresult * 1000);
            }


        } else if (hg_proc2 < 1000000) {
            $("#sell_proc").val(Math.round(rupiah / 10));
            console.log('output proc mamdani : ' + rupiah / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_proc").val(Math.round(rupiah));
            console.log('output proc mamdani : ' + rupiah);
        }

        // ############ OUTPUT DEFUZZYFIKASI mOTHERBOARD #############
        if (dfmbRound >= hg_mb_rp) {
            var hasil = hg_mb_rp - dfmbRound;
            var hasil2 = hasil * usemb2;
            var finalresult = hasil2 + dfmbRound;
            // console.log('input mb : ' + hg_mb_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_mb2 >= 1000000) {
                var smb = Math.round(finalresult * 10000);
                if (smb < 0) {
                    var smb_r = smb * -1;
                    console.log('output mobo mamdanii : : ' + smb_r);
                    $("#sell_mb").val(smb_r);
                } else {
                    console.log('output mobo mamdanii : ' + smb);
                    $("#sell_mb").val(smb);
                }
                // $("#sell_mb").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_mb").val(Math.round(finalresult * 1000));
                console.log('output mobo mamdanii : ' + finalresult * 1000);
            }


        } else if (hg_mb2 < 1000000) {
            $("#sell_mb").val(Math.round(rupiah_mb / 10));
            console.log('output mamdani mb : ' + rupiah_mb / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_mb").val(Math.round(rupiah_mb));
            console.log('output mamdani mb : ' + rupiah_mb);
        }

        // ############ OUTPUT DEFUZZYFIKASI MEMORY RAM #############
        if (dframRound >= hg_ram_rp) {
            var hasil = hg_ram_rp - dframRound;
            var hasil2 = hasil * useram2;
            var finalresult = hasil2 + dframRound;
            // console.log('input ram : ' + hg_ram_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_ram2 >= 1000000) {
                var sram = Math.round(finalresult * 10000);
                if (sram < 0) {
                    var sram_r = sram * -1;
                    console.log('output ram mamdanii : : ' + sram_r);
                    $("#sell_ram").val(sram_r);
                } else {
                    console.log('output ram mamdanii : ' + sram);
                    $("#sell_ram").val(sram);
                }
                // $("#sell_ram").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_ram").val(Math.round(finalresult * 1000));
                console.log('output ram mamdanii : ' + finalresult * 1000);
            }


        } else if (hg_ram2 < 1000000) {
            $("#sell_ram").val(Math.round(rupiah_ram / 10));
            console.log('output mamdani ram : ' + rupiah_ram / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_ram").val(Math.round(rupiah_ram));
            console.log('output mamdani ram : ' + rupiah_ram);
        }

        // ############ OUTPUT DEFUZZYFIKASI SSD #############
        if (dfssdRound >= hg_ssd_rp) {
            var hasil = hg_ssd_rp - dfssdRound;
            var hasil2 = hasil * usessd2;
            var finalresult = hasil2 + dfssdRound;
            // console.log('input ram : ' + hg_ssd_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_ssd2 >= 1000000) {
                var sssd = Math.round(finalresult * 10000);
                if (sssd < 0) {
                    var sssd_r = sssd * -1;
                    console.log('output mamdani ssd : : ' + sssd_r);
                    $("#sell_ssd").val(sssd_r);
                } else {
                    console.log('output mamdani ssd : ' + sssd);
                    $("#sell_ssd").val(sssd);
                }
                // $("#sell_ssd").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_ssd").val(Math.round(finalresult * 1000));
                console.log('output mamdani ssd : ' + finalresult * 1000);
            }


        } else if (hg_ssd2 < 1000000) {
            $("#sell_ssd").val(Math.round(rupiah_ssd / 10));
            console.log('output mamdani ssd : ' + rupiah_ssd / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_ssd").val(Math.round(rupiah_ssd));
            console.log('output mamdani ssd : ' + rupiah_ssd);
        }

        // ############ OUTPUT DEFUZZYFIKASI HDD #############
        if (dfhddRound >= hg_hdd_rp) {
            var hasil = hg_hdd_rp - dfhddRound;
            var hasil2 = hasil * usehdd2;
            var finalresult = hasil2 + dfhddRound;
            // console.log('input ram : ' + hg_hdd_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_hdd2 >= 1000000) {
                var shdd = Math.round(finalresult * 10000);
                if (shdd < 0) {
                    var shdd_r = shdd * -1;
                    console.log('output mamdani hdd : : ' + shdd_r);
                    $("#sell_hdd").val(shdd_r);
                } else {
                    console.log('output mamdani hdd : ' + shdd);
                    $("#sell_hdd").val(shdd);
                }
                // $("#sell_hdd").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_hdd").val(Math.round(finalresult * 1000));
                console.log('output mamdani hdd : ' + finalresult * 1000);
            }


        } else if (hg_hdd2 < 1000000) {
            $("#sell_hdd").val(Math.round(rupiah_hdd / 10));
            console.log('output mamdani hdd : ' + rupiah_hdd / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_hdd").val(Math.round(rupiah_hdd));
            console.log('output mamdani hdd : ' + rupiah_hdd);
        }

        // ############ OUTPUT DEFUZZYFIKASI VGA #############
        if (dfvgaRound >= hg_vga_rp) {
            var hasil = hg_vga_rp - dfvgaRound;
            var hasil2 = hasil * usevga2;
            var finalresult = hasil2 + dfvgaRound;
            // console.log('input ram : ' + hg_vga_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_vga2 >= 1000000) {
                var svga = Math.round(finalresult * 10000);
                if (svga < 0) {
                    var svga_r = svga * -1;
                    console.log('output mamdani vga : : ' + svga_r);
                    $("#sell_vga").val(svga_r);
                } else {
                    console.log('output mamdani vga : ' + svga);
                    $("#sell_vga").val(svga);
                }
                // $("#sell_vga").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_vga").val(Math.round(finalresult * 1000));
                console.log('output mamdani vga : ' + finalresult * 1000);
            }


        } else if (hg_vga2 < 1000000) {
            $("#sell_vga").val(Math.round(rupiah_vga / 10));
            console.log('output mamdani vga : ' + rupiah_vga / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_vga").val(Math.round(rupiah_vga));
            console.log('output mamdani vga : ' + rupiah_vga);
        }

        // ############ OUTPUT DEFUZZYFIKASI PSU #############
        if (dfpsuRound >= hg_psu_rp) {
            var hasil = hg_psu_rp - dfpsuRound;
            var hasil2 = hasil * usepsu2;
            var finalresult = hasil2 + dfpsuRound;
            // console.log('input ram : ' + hg_psu_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_psu2 >= 1000000) {
                var spsu = Math.round(finalresult * 10000);
                if (spsu < 0) {
                    var spsu_r = spsu * -1;
                    console.log('output mamdani psu : : ' + spsu_r);
                    $("#sell_psu").val(spsu_r);
                } else {
                    console.log('output mamdani psu : ' + spsu);
                    $("#sell_psu").val(spsu);
                }
                // $("#sell_psu").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_psu").val(Math.round(finalresult * 1000));
                console.log('output mamdani psu : ' + finalresult * 1000);
            }


        } else if (hg_psu2 < 1000000) {
            $("#sell_psu").val(Math.round(rupiah_psu / 10));
            console.log('output mamdani psu : ' + rupiah_psu / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_psu").val(Math.round(rupiah_psu));
            console.log('output mamdani psu : ' + rupiah_psu);
        }

        // ############ OUTPUT DEFUZZYFIKASI CASING #############
        if (dfcaseRound >= hg_case_rp) {
            var hasil = hg_case_rp - dfcaseRound;
            var hasil2 = hasil * usecase2;
            var finalresult = hasil2 + dfcaseRound;
            // console.log('input ram : ' + hg_case_rp);
            // console.log('hasil pengurangan : ' + hasil);
            // console.log('lalu di X pemakaian : ' + hasil2);
            // console.log('hasil akhir : ' + dfmbRound);
            // console.log('hasil before convert : ' + convert);
            if (hg_case2 >= 1000000) {
                var scase = Math.round(finalresult * 10000);
                if (scase < 0) {
                    var scase_r = scase * -1;
                    console.log('output mamdani case : : ' + scase_r);
                    $("#sell_case").val(scase_r);
                } else {
                    console.log('output mamdani case : ' + scase);
                    $("#sell_case").val(scase);
                }
                // $("#sell_case").val(Math.round(finalresult * 10000));
                // console.log('hasil akhir jika out > input mb : ' + finalresult * 10000);
            } else {
                $("#sell_case").val(Math.round(finalresult * 1000));
                console.log('output mamdani case : ' + finalresult * 1000);
            }


        } else if (hg_case2 < 1000000) {
            $("#sell_case").val(Math.round(rupiah_case / 10));
            console.log('output mamdani case : ' + rupiah_case / 10); //hasil akhir diatas 3jt
        } else {
            $("#sell_case").val(Math.round(rupiah_case));
            console.log('output mamdani case : ' + rupiah_case);
        }



        $.ajax({
            type: "POST",
            url: '<?= base_url(); ?>/fuzzyC/insertHasilFuzzy',
            data: $("#form_pc").serialize(), //ambil semua data di dalam form
            success: function() {
                // alert("berhasil!!!!")
                loadlist_items();
                modalshow();
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        })

    })
</script>

<script>

</script>

<!-- <script>
    $("#hitung").click(function() {
        var proc = $("#hg_proc").val();
        var procUse = $("#use_proc").val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>/fuzzyC/fuzzyproc',
            dataType: "JSON",
            data: {
                price_proc: proc,
                use_proc: procUse
            },
            success: function(result) {
                // for (var i = 0; i < result.length; i++) {
                //     $("#gtotal").val(result[i].harga_jual);

                // }
                alert(result)
            },
            error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        });

    })
</script> -->