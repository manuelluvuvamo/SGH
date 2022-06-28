<footer class=" shadow-lg p-4 mt-4 bg-light" >
  <hr>
  <p class="text-center">Desenvolvido por EcoRomy &copy;</p>
  <hr>
</footer>
</div> <!-- .wrapper -->

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="/dashboard/js/jquery.min.js"></script>
<script src="/dashboard/js/popper.min.js"></script>
<script src="/dashboard/js/moment.min.js"></script>
<script src="/dashboard/js/bootstrap.min.js"></script>
<script src="/dashboard/js/simplebar.min.js"></script>
<script src='/dashboard/js/daterangepicker.js'></script>
<script src='/dashboard/js/jquery.stickOnScroll.js'></script>
<script src="/dashboard/js/tinycolor-min.js"></script>
{{-- <script src="/dashboard/js/config.js"></script> --}}
<script src="/dashboard/js/d3.min.js"></script>
<script src="/dashboard/js/topojson.min.js"></script>
<script src="/dashboard/js/datamaps.all.min.js"></script>
<script src="/dashboard/js/datamaps-zoomto.js"></script>
<script src="/dashboard/js/datamaps.custom.js"></script>
<script src="/dashboard/js/Chart.min.js"></script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;

</script>
<script src="/dashboard/js/gauge.min.js"></script>
<script src="/dashboard/js/jquery.sparkline.min.js"></script>
<script src="/dashboard/js/apexcharts.min.js"></script>
<script src="/dashboard/js/apexcharts.custom.js"></script>
<script src='/dashboard/js/jquery.mask.min.js'></script>
<script src='/dashboard/js/select2.min.js'></script>
<script src='/dashboard/js/jquery.steps.min.js'></script>
<script src='/dashboard/js/jquery.validate.min.js'></script>
<script src='/dashboard/js/jquery.timepicker.js'></script>
<script src='/dashboard/js/dropzone.min.js'></script>
<script src='/dashboard/js/uppy.min.js'></script>
<script src='/dashboard/js/quill.min.js'></script>
<script src='/dashboard/js/jquery.dataTables.min.js'></script>
<script src='/dashboard/js/dataTables.bootstrap4.min.js'></script>



<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
    $('#dataTable-2').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });

</script>

<script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });
    $('.select2-multi').select2({
        multiple: true,
        theme: 'bootstrap4',
    });
    $('.drgpicker').daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale: {
            format: 'MM/DD/YYYY'
        }
    });
    $('.time-input').timepicker({
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
    });
    /** date range picker */
    if ($('.datetimes').length) {
        $('.datetimes').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                'month')]
        }
    }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
    });
    $('.input-zip').mask('00000-000', {
        placeholder: "____-___"
    });
    $('.input-money').mask("#.##0,00", {
        reverse: true
    });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        },
        placeholder: "___.___.___.___"
    });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{
                    'header': 1
                },
                {
                    'header': 2
                }
            ],
            [{
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }
            ],
            [{
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }
            ],
            [{
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }
            ], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            [{
                    'color': []
                },
                {
                    'background': []
                }
            ], // dropdown with defaults from theme
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor, {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>


<script>
    function mudarCor(novaCor) {
        var elemento = document.getElementById("scroller");
        elemento.style.overflow = "hidden !important";
    }

</script>

<style>
    /* style a mexer */
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 35px;
        user-select: none;
        -webkit-user-select: none;

    }

</style>

<script type="text/javascript">
    $('.buscarEscola').select2({
        placeholder: 'Selecionar Escola',
        ajax: {
            url: '/buscar/escolas',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.vc_escola,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

       $('.buscarClasse').select2({
        placeholder: 'Selecionar a classe',
        ajax: {
            url: '/buscar/classes',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                  results: $.map(data, function(item) {
                        return {
                            text: item.vc_classe,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });



       $('.buscarAnoLetivo').select2({
        placeholder: 'Selecionar o ano lectivo',
        ajax: {
            url: '/buscar/anoletivo',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                  results: $.map(data, function(item) {
                        return {
                            text: item.ya_inicio+'-'+item.ya_fim,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });



       $('.buscarDiasSemana').select2({
        placeholder: 'Selecionar o dia da semana',
        ajax: {
            url: '/buscar/diasSemana',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log('aqui', data)

                return {
                  results: $.map(data, function(item) {
                        return {
                            text: item.vc_dia,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });


</script>

<script>
	$("#img-input").click(function () {
		$("#image_visible").hide();
	});
</script>

<script>
function readImage() {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };
        file.readAsDataURL(this.files[0]);
    }
}

document.getElementById("img-input").addEventListener("change", readImage, false);</script>
<script src="/dashboard/js/apps.js"></script>



</body>

</html>
