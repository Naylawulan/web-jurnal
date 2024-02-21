<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Pengajar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
                            <a href="{{ route('pengajar.index') }}" class="btn btn-sm btn-secondary mb-3">Kembali</a>
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Guru</label>
                                <select class="from-select col-md-12" name="guru_id" id="guru_id">
                                    <option class="col-md-12" value="">Select Guru</option>
                                    @foreach ($data as $guru)
                                    <option class="col-md-12" value="{{ $guru->id }}"> {{ $guru->nama }} </option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Mapel</label>
                                <select class="from-select col-md-12" name="mapel_id" id="mapel_id">
                                    <option class="col-md-12" value="">Select  Mapel</option>
                                    @foreach ($item as $mapel)
                                    <option class="col-md-12" value="{{ $mapel->id }}"> {{ $mapel->nama_mapel }} </option>

                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control" @error('kelas')is-invalid @enderror name="kelas">
                                    <option value="XII RPL">XII RPL</option>
                                    <option value="XII DKV">XII DKV</option>
                                    <option value="XII TKJ">XII TKJ</option>
                                    <option value="XII LISTRIK">XII LISTRIK</option>
                                    <option value="XII ELEKTRONIKA">XII ELEKTRONIKA</option>
                                    <option value="XII BUSANA">XII BUSANA</option>
                                    <option value="XII PSPT">XII PSPT</option>
                                    <option value="XII OTOTRONIKA">XII OTOTRONIKA</option>
                                    <option value="XII MEKATRONIKA">XII MEKATRONIKA</option>

                                </select>

                                <!-- error message untuk title -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Jam Pelajaran</label>
                                <select class="form-control" @error('jam_pelajaran')is-invalid @enderror name="jam_pelajaran">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>

                                </select>

                                <!-- error message untuk title -->
                                @error('jam_pelajaran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
