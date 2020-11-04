<style type="text/css">
  .border{
    border-color: #ebebeb;
    border-style: solid;
    border-width: 0 1px 1px;
  }
</style>
<br><br><br>
@extends('art.layouts.master')
@section('content')
<!-- Modal -->
    @if(session('message'))
          <div class="alert alert-success" role="alert">
          {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
      @if(session('success'))
        <div class="alert alert-success" role="alert">
         {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
  <!-- End Modal -->

  <!-- Content -->
  <div id="mission-section" class="ptb ptb-xs-180">
      <div class="container">
  <div class="row">
          <div class="col-md-12 col-lg-12 dark-bg our-vision light-color">
            <div class="block-title v-line mb-35">
              <h2 class="row d-flex align-items-center">
                <span class="col-md-10">@<span></span>{{auth()->user()->username}}<span></span>'s Profile</span> 
                <a class="col-md-2" href="/profilku/setting/{{auth()->user()->id}}" style="font-size: 20px;"><i class="fa fa-cog mr4"></i>Edit Profile</a></h2>
              <p class="ml-15" style="text-decoration: underline;" data-color="mid">
               {{auth()->user()->role}}
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 border">
            <div class="about-block clearfix">
              <div class="fl width-25per box-shadow mt-15 mb-xs-15">
                <img class="img-responsive" src="{{auth()->user()->art->getPhoto()}}" alt="Photo">
              </div>
              <div class="text-box pt-15 pb-0 pl-70 pl-xs-0 width-75per fl">
                <div class="box-title">
                  <h3>{{auth()->user()->art->name}}</h3>
                </div>
                <div class="text-content">
                  <h5><i class="fl-online-indicator"></i> Status: <span></span>{{auth()->user()->art->status}}</h5>
                  <p><i class=""></i>Email: <span></span>{{auth()->user()->email}}</p>
                   <p><i class="fl-online-indicator"></i>No HP: <span></span>{{auth()->user()->art->nohp}}</p>
                   <hr>
                </div>
              </div>
              <div class="text-box pt-0 pb-15 pl-70 pl-xs-0 width-75per fl">
                <div class="box-title">
                <h3>ALAMAT: </h3>
                </div>
                <div class="text-content">
                  <p>Kode Pos: <span></span>
                    @if(auth()->user()->art->kodepos == null)
                     ——
                    @else()
                   {{auth()->user()->art->kodepos}}
                    @endif
                  </p>
                   <p>Kecamatan: <span></span>
                    @if(auth()->user()->art->kecamatan == null)
                     ——
                    @else()
                   {{auth()->user()->art->kecamatan}}
                    @endif
                  </p>
                   <p>Alamat: <span></span>
                    @if(auth()->user()->art->alamat == null)
                     ——
                    @else()
                   {{auth()->user()->art->alamat}}
                    @endif</p>
                </div>
              </div>
            </div>
          </div>
          <p>Bergabung: {{auth()->user()->created_at}}</p>
        </div>
        <div class="row ">
          <div class="col-md-12 col-lg-12 border xs-9">
            <h4 class="row d-flex align-items-center">
                <span class="col-md-10">Deskripsi</span> 
                 <button class="ButtonElement ng-star-inserted ml-65" type="button" data-color="secondary" data-display="inline" data-toggle="modal" data-target="#exampleModal"> Tambah Deskripsi </button></h4>
              <hr>
            <div _ngcontent-webapp-c34="" role="paragraph" class="NativeElement ng-star-inserted pb-60" data-color="dark" data-size="small" data-weight="normal" data-style="italic" data-line-break="false">
              <p>
                  @if(auth()->user()->art->deskripsi == null)
                  tidak ada deskripsi informasi 
                  @else()
                 {{auth()->user()->art->deskripsi}}
                  @endif
                </p>
            </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Deskripsi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
         </div>
        <div class="modal-body">
        <form action="/profilku/deskripsi/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
          <label for="formGroupExampleInput2" value="{{old('deskripsi')}}">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" ></textarea>
        </div>
      <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
          </form>
             </div>
          </div>
        </div>
         </div>

          </div>
        </div>
      </div>
    </div>
@endsection