@extends('header')
@section('content')
<section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pilih Titik Koordinat</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-12 col-md-6 col-lg-4">
                        <div class="input-group">
                          <input type="text" class="form-control" id="input-lat" placeholder="Latitude">
                          <input type="text" class="form-control" id="input-lng" placeholder="Longitude">
                        </div>
                      </div>
                    </div>
                    <div class="alert alert-info">
                      Tentukan titik koordinat dengan lokasi
                    </div>
                    <div id="map" data-height="400"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
