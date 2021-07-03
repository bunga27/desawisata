<!DOCTYPE html>
<html lang="en">


<!-- export-table.html  21 Nov 2019 03:55:25 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @if (auth()->user()->level=="super")
             <title>DESAWISATA-SUPER</title>
    @else
        <title>DESAWISATA-ADMIN</title>
    @endif

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('otika/assets/css/app.min.css')}}">
  <!-- Template CSS -->
<!-- General CSS Files -->
<link rel="stylesheet" href="{{ url('otika/assets/css/app.min.css') }}">
<link href="{{ url('otika/assets/bundles/lightgallery/dist/css/lightgallery.cs') }}s" rel="stylesheet">

  <link rel="stylesheet" href="{{url('otika/assets/bundles/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">

  <link rel="stylesheet" href="{{url('otika/assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('otika/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{url('otika/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/png' href="{{url('otika/assets/img/ms.png')}}" />
  <!-- JS Libraies -->
  <script src="{{url('otika/assets/bundles/sweetalert/sweetalert.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{url('otika/assets/js/page/sweetalert.js')}}"></script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <!--<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"-->
          <!--    class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>-->
          <!--  </a>-->
          <!--  <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">-->
          <!--    <div class="dropdown-header">-->
          <!--      Notifikasi-->
          <!--      <div class="float-right">-->
          <!--        <a href="#">Tandai sudah dibaca semua</a>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--    <div class="dropdown-list-content dropdown-list-icons">-->
          <!--      <a href="#" class="dropdown-item dropdown-item-unread"> -->
          <!--      <span-->
          <!--          class="dropdown-item-icon bg-primary text-white"> <i class="fasfa-code"></i>-->
          <!--        </span> <span class="dropdown-item-desc"> Template update is-->
          <!--          available now! <span class="time">2 Min-->
          <!--            Ago</span>-->
          <!--      </span> -->
          <!--    </div>-->
          <!--    <div class="dropdown-footer text-center">-->
          <!--      <a href="#">Tampilkan semua <i class="fas fa-chevron-right"></i></a>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</li>-->
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{url('otika/assets/img/mss.png')}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              @if (auth()->user()->level=="super")

                <div class="dropdown-title">Hii Super Admin</div>
                @else
                <div class="dropdown-title">Hii Admin</div>

                @endif
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"></i> <i class="fas fa-sign-out-alt"></i>
              {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{url('otika/assets/img/mss.png')}}" class="header-logo" /> <span
                class="logo-name">DESA WISATA</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">WEB ADMIN DESA WISATA KABUPATEN MADIUN</li>
            <li class="dropdown">
              <a href="{{url('/')}}" class="nav-link"><i data-feather="home"></i><span>BERANDA</span></a>
            </li>
            @if (auth()->user()->level=="super")
            <li class="dropdown">
              <a href="{{url('/dataadmin')}}" class="nav-link"><i data-feather="users"></i><span>DATA ADMIN</span></a>
            </li>
            @endif
            <li class="dropdown">
              <a href="{{url('/wisata')}}" class="nav-link"><i data-feather="briefcase"></i><span>WISATA</span></a>
            </li>
            {{-- <li class="dropdown">
              <a href="{{url('/berita')}}" class="nav-link"><i data-feather="monitor"></i><span>BERITA</span></a>
            </li> --}}
            <li class="dropdown">
              <a href="{{url('/event')}}" class="nav-link"><i data-feather="command"></i><span>EVENT</span></a>
            </li>
            <li class="dropdown">
              <a href="{{url('/ulasan')}}" class="nav-link"><i data-feather="mail"></i><span>ULASAN</span></a>
            </li>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
          @yield('content')
            </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">Desa Wisata 2021</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script>
var loadFile = function(event){
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
}

</script>
  <!-- General JS Scripts -->
  <script src="{{url('otika/assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="{{url('otika/assets/bundles/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{url('otika/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
  <script src="{{url('otika/assets/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
  <script src="{{url('otika/assets/js/page/datatables.js')}}"></script>
  <!-- Sweetalert -->
    <!-- JS Libraies -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyBBKs1worqyabS9cYVe-quTLI91eot-w-8&amp;"></script>
  <script src="{{url('otika/assets/bundles/gmaps.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{url('otika/assets/js/page/gmaps-draggable-marker.js')}}"></script>
  <!-- Template JS File -->
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
  <!-- JS Libraies -->
  <script src="{{url('otika/assets/bundles/sweetalert/sweetalert.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{url('otika/assets/js/page/sweetalert.js')}}"></script>
  <script src="{{url('otika/wilayah.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{url('otika/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{url('otika/assets/js/custom.js')}}"></script>
  <script src="{{url('otika/assets/js/page/light-gallery.js')}}"></script>
  <script src="{{url('otika/assets/bundles/lightgallery/dist/js/lightgallery-all.js')}}"></script>

{{-- batas --}}

<!-- JS Libraies -->
<script src=""></script>
<!-- Page Specific JS File -->
<script src=""></script>
  <script type="text/javascript">

    $(document).ready(function () {

        var $table = $('#table-1').DataTable();

        //start edit record
        table.on('click', '.edit', function () {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#nama_event').val(data[1]);
            $('#deskripsi').val(data[2]);
            $('#tayang_mulai').val(data[3]);
            $('#tayang_selesai').val(data[4]);
            $('#gambar').val(data[5]);

            $('#editform').attr('action', '/event/'+data[0]);
            $('#editmodal').modal('show');

        });

    });

  </script>
{{-- batas --}}
  <script>
    $(".swal-6").click(function (e) {
    var id = $(this).attr('data-id');
    swal({
        title: 'Yakin hapus data?',
        text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            // swal('Poof! Your imaginary file has been deleted!', {
            // icon: 'success',
            // });
            $(`#delete${id}`).submit();
        } else {
            // swal('Your imaginary file is safe!');
        }
        });
    });
  </script>
  {{-- <script>
    $('#kecamatan').change(function(){
    var kecID = $(this).val();
    if(kecID){
        $.ajax({
           type:"GET",
           url:"getdesa?kecID="+kecID,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#desa").empty();
                $("#desa").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa").empty();
            }
           }
        });
    }else{
        $("#desa").empty();
    }
   });
  </script> --}}

</body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->
</html>
