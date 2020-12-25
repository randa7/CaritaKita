@extends('partial.dashboard_penulis')


@section('menu')
<a href="{{ url('/penulis/dashboard') }}" class="active"><i class="fas fa-desktop"></i>Dashboard</a>
<a href="{{ url('/penulis/editprofile') }}"><i class="fas fa-pencil-alt"></i>Edit Profil</a>
<a href="{{ url('/penulis/post') }}"><i class="fas fa-desktop"></i>Daftar Postingan</a>
 <a href="{{ url('/penulis/tambahpost') }}"><i class="fas fa-book"></i>Tambah Postingan</a>
@endsection

@section('content')

<div class="container" style="margin: 3%; padding-left: 17%;">
	<div class="" style="background: white">
		
		<div class="card-body">
			@if ($errors->any())
                @foreach ($errors->all() as $e)
                    <div>{{ $e }}</div>
                @endforeach
			@endif

            <form action="" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="judul">Judul</label>
          			<input type="text" class="form-control" name="judul" value="{{ $post->judul }}" />
        		</div>

        		<div class="form-group">
          			<label for="kategori">Kategori</label><br />
          			<select name="kategori">
          				@foreach ($kategori as $k)
                            @if ($k->idkategori == $post->idkategori)
                                <option value="{{ $k->idkategori }}" selected>{{ $k->nama }}</option>
                            @else
                                <option value="{{ $k->idkategori }}">{{ $k->nama }}</option>
                            @endif
          				@endforeach
          			</select>
          		</div>

          		<div class="form-group">
          			<label for="isi">Isi post</label>
          			<textarea rows="5" class="form-control" name="isi">{{ $post->isipost }}</textarea>
          		</div>

          		<div class="form-group">
          			<input type="file" accept="image/*" name="gambar">
          		</div>

          		<div class="form-group">
          			<button type="submit" class="btn btn-primary">
          				Edit
          			</button>
          			<a href="{{ url('penulis/post') }}" class="btn btn-danger">
          				Cancel
          			</a>
          		</div>
          	</form>
        </div>
    </div>
</div>

@endsection
