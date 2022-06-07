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
        var murah = new linier_turun(100, 600);
        var mahal = new linier_naik(100, 600);
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
        var murah = new linier_turun(100, 500);
        var mahal = new linier_naik(100, 500);
        return {
            "murah_mb": murah.u(x),
            "mahal_mb": mahal.u(x)
        };
    }

    function mf_outHargaMb_sugeno() {
        return {
            "murah": 100,
            "mahal": 500
        };
    }
    // #################end motherboard ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION RAM MEMORY #######
    function mf_HargaRAM(x) {
        var murah = new linier_turun(100, 500);
        var mahal = new linier_naik(100, 500);
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
        var murah = new linier_turun(100, 400);
        var mahal = new linier_naik(100, 400);
        return {
            "murah_ram": murah.u(x),
            "mahal_ram": mahal.u(x)
        };
    }

    function mf_outHargaRAM_sugeno() {
        return {
            "murah": 100,
            "mahal": 400
        };
    }
    // ################# END RAM MEMORY ##############
    // --------------------------------------------------------------------------

    // ########### MEMBER FUNCTION SSD #######
    function mf_HargaSSD(x) {
        var murah = new linier_turun(100, 400);
        var mahal = new linier_naik(100, 400);
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
        var murah = new linier_turun(100, 300);
        var mahal = new linier_naik(100, 300);
        return {
            "murah_ssd": murah.u(x),
            "mahal_ssd": mahal.u(x)
        };
    }

    function mf_outHargaSSD_sugeno() {
        return {
            "murah": 100,
            "mahal": 300
        };
    }
    // ################# END RAM MEMORY ##############
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


    $("#hitung").click(function() {
        //input price proc
        var hg_proc = parseFloat($("#hg_proc").val());
        var useProc = parseFloat($("#use_proc").val());

        var hg_mb = parseFloat($("#hg_mb").val());
        var usemb = parseFloat($("#use_mb").val());

        var hg_ram = parseFloat($("#hg_ram").val());
        var useram = parseFloat($("#use_ram").val());

        var hg_ssd = parseFloat($("#hg_ssd").val());
        var usessd = parseFloat($("#use_ssd").val());

        if (hg_proc || hg_mb || hg_ram || hg_ssd < 10000000) {
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

        //######### DEFUZZYFIKASI PROCESSOR MAMDANI ############
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
        } else {
            g_sprc = Math.round(sprc * 10000);
            console.log('out sugeno proc : ' + g_sprc);
        }


        //######### DEFUZZYFIKASI MOTHERBOARD MAMDANI ############
        var sa_mb = 0;
        var sb_mb = 0;
        var aa_mb = 100;
        for (var i = aa_mb; i <= 500; i += aa_mb) {
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
        } else {
            g_smobo = Math.round(smobo * 10000);
            console.log('out sugeno mobo : ' + g_smobo);
        }

        //######### DEFUZZYFIKASI RAM MEMORY MAMDANI ############
        var sa_ram = 0;
        var sb_ram = 0;
        var aa_ram = 100;
        for (var i = aa_ram; i <= 500; i += aa_ram) {
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
        } else {
            g_sram = Math.round(sram * 10000);
            console.log('out sugeno ram : ' + g_sram);
        }

        //######### DEFUZZYFIKASI SSD MAMDANI ############
        var sa_ssd = 0;
        var sb_ssd = 0;
        var aa_ssd = 100;
        for (var i = aa_ssd; i <= 300; i += aa_ssd) {
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
        } else {
            g_sssd = Math.round(sssd * 10000);
            console.log('out sugeno ssd : ' + g_sssd);
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
            $("#sell_ram").val(Math.round(rupiah_ram));
            console.log('output mamdani ram : ' + rupiah_ram);
        }

        //@@@@@@@@@ TOTAL ALL @@@@@@@@@@@@@@@@
        var fp_proc = parseFloat($("#sell_proc").val());
        var fp_mb = parseFloat($("#sell_mb").val());
        var g_total = fp_proc + fp_mb;
        alert("total harga" + g_total);
        // console.log('input harga : ' + hg_proc);
        // console.log('layak tinggi : ' + mahal);

    })
    // ##########################################end fuzzy proc######################################
    // ########################## mulai fuzzy motherboard #############################################
    //anggota harga motherboard
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