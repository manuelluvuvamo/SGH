 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>{{isset($instituicao->nomeLongo)?$instituicao->nomeLongo:'Sistema de Gestão de Hospitais'}}</span></strong>.Todos os direitos reservados - {{date("Y")}}
    </div>
    <div class="credits">
     
      Desenvolvido por<a href="#">Manuel Luvuvamo</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  {{-- <script>
    $(document).ready(function() {

        //start delete
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');
            if (!$('#confirm-delete').length) {
                $('table').append(
                    '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Eliminar os dados</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que pretende elimnar?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <a  class="btn btn-info" id="dataConfirmOk">Eliminar</a> </div></div></div></div>'
                );
            }
            $('#dataConfirmOk').attr('href', href);
            $('#confirm-delete').modal({
                shown: true
            });
            return false;

        });
        //end delete
    });

</script> --}}
{{-- <script>
  $(document).ready(function() {
      //start delete
      $('a[data-confirm]').click(function(ev) {
          var href = $(this).attr('href');
          if (!$('#confirm-delete').length) {
              $('table').append(
                  '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Eliminar os dados</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que pretende elimnar?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <a  class="btn btn-info" id="dataConfirmOk">Eliminar</a> </div></div></div></div>'
              );
          }
          $('#dataConfirmOk').attr('href', href);
          $('#confirm-delete').modal({
              shown: true
          });
          return false;
      });
      //end delete
  });
</script> --}}
  <!-- Vendor JS Files -->
  <script src="{{ asset('/dashboard/js/select2.min.js') }}"></script>
  <script src="{{asset('/dashboard/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('/dashboard/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('/dashboard/js/sweetalert2.all.min.js')}}"></script>
  <script src="{{ asset('/dashboard/js/jquery.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/dashboard/js/main.js')}}"></script>

</body>

</html>
