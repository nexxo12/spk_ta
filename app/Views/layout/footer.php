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
</script>

<script>
    //fuzzy processor
    //kurva turun
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
    //kurva naik
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
    //kurva segitiga
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
    //anggota harga processor
    function mf_HargaProc(x) {
        var murah = new linier_turun(100, 900);
        var mahal = new linier_naik(100, 900);
        return {
            "murah": murah.u(x),
            "mahal": mahal.u(x),
        };
    }
    //anggota pemakaian
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
    //anggota output harga
    function mf_outHargaProc(x) {
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
        return {
            "murah": murah.u(x),
            "mahal": mahal.u(x)
        };
    }
    //inferensi
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


    $("#hitung").click(function() {
        //input price proc
        var hg_proc = parseFloat($("#hg_proc").val());
        var useProc = parseFloat($("#use_proc").val());

        if (hg_proc < 100000) {
            alert("masukan harga diatas 100.000");
        } else if (hg_proc < 10000000) { //shorting jika input dibawah 3jt
            var hg_proc2 = hg_proc.toString(); // convert string
            var hg_proc3 = hg_proc2.substring(0, 3); //diambil 3 digit (sesuai parameter kurva)
            hg_proc_rp = parseFloat(hg_proc3);
            console.log('harga : ' + hg_proc_rp);
            hg_proc = mf_HargaProc(hg_proc_rp);
            console.log(hg_proc);
        } else {
            console.log('harga : ' + hg_proc);
            hg_proc = mf_HargaProc(hg_proc);
            console.log(hg_proc);
        }

        if (useProc < 1) {
            alert("masukan pemakaian minim 1 tahun");
        } else {
            //input pemakaian
            console.log('pemakaian : ' + useProc);
            useProc = mf_UseProc(useProc);
            console.log(useProc);
        }


        //rules
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

        //defuzufikasi mamdani centroid
        var sa = 0;
        var sb = 0;
        var aa = 100;
        for (var i = aa; i <= 600; i += aa) { //batas atas, batas bawah
            hargaout = mf_outHargaProc(i);
            c = fmaxmin(hargaout.murah, murah, hargaout.mahal, mahal);
            sa += i * c;
            sb += c;
        }
        var mm = sa / sb;
        var mmRound = Math.round(mm);
        var hg_proc2 = parseFloat($("#hg_proc").val());
        var useProc2 = parseFloat($("#use_proc").val());
        var convert = mm * 10000;
        var rupiah = Math.round(convert);

        if (mmRound >= hg_proc_rp) {
            var hasil = hg_proc_rp - mmRound;
            var hasil2 = hasil * useProc2;
            var finalresult = hasil2 + mmRound; //hasil akhir dibawah 3jt
            console.log('input : ' + hg_proc_rp);
            console.log('hasil pengurangan : ' + hasil);
            console.log('lalu di X pemakaian : ' + hasil2);
            console.log('hasil akhir : ' + mmRound);
            // console.log('hasil before convert : ' + convert);
            console.log('hasil akhir jika out > input : ' + finalresult * 1000);

        } else if (hg_proc2 < 1000000) {
            console.log('kelayakan mamdani : ' + rupiah / 10); //hasil akhir diatas 3jt
        } else {
            console.log('kelayakan mamdani : ' + rupiah);
        }
        // console.log('input harga : ' + hg_proc);
        // console.log('layak tinggi : ' + mahal);

    })
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