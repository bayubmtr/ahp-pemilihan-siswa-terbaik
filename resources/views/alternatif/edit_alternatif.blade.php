@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">TAMBAH ALTERNATIF</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Alternatif</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="card">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="post" action="/alternatif/{{$alternatif->nisn}}">
        @csrf
        @method('PATCH')
        <div class="row">
          <div class="col-md-6">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">NISN</label>
                <input type="text" class="form-control" value="{{$alternatif->nisn}}" name="nisn" id="exampleInputEmail1" placeholder="kode nisn siswa">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Siswa</label>
                <input type="text" class="form-control" value="{{$alternatif->nama}}" name="nama" id="exampleInputPassword1" placeholder="nama">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body">
              @foreach($data as $krit)
              <div class="form-group">
                <label for="exampleInputEmail1">Bagaimana {{$krit->nama}} siswa ini ?</label>
                <select class="form-control" name="nilai[{{$krit->kode}}]">
                  @foreach($krit->sub_kriteria as $sub)
                      <option value="{{$sub->kode}}"
                      @foreach($alternatif->nilai_alternatif as $nil)
                      @if ($nil->kode_sub_kriteria == $sub->kode))
                          selected="selected"
                      @endif
                      @endforeach
                      >{{$sub->nama}}</option>
                  @endforeach
                </select>
              </div>
              @endforeach
            </div>
          </div>
        </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Tambah</button>
          </div>
        </form>
      </div>
      </div>
    </section>
@include ('includes.script')
@endsection
