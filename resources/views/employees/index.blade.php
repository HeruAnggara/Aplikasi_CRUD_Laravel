<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3 class="text-center my-3">Tabel Data Karyawan</h3>
                        
                        <nav class="navbar bg-body-tertiary py-3">
                            <div class="container-fluid">
                                <a href="{{ route('employees.create') }}" class="btn btn-md btn-outline-success">+ Data Karyawan</a>   
                              <form class="d-flex" role="search" action="" method="GET">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg></span>
                                <input class="form-control" name="keyword"  type="text" placeholder="ID atau Nama Karyawan">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('employees.index') }}" class="btn btn-md btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                  </svg></a>
                              </form>
                            </div>
                          </nav>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID Karyawan</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">No. Handphone</th>
                                <th scope="col">Gaji</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id_karyawan }}</td>
                                    <td>{{ $employee->nama_karyawan }}</td>
                                    <td>{{ $employee->alamat }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->no_telp }}</td>
                                    <td>Rp {!! $employee->gaji !!}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-outline-success">Detail</a>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Karyawan belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>