<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3 class="text-start my-3">Detail Data {{ $employee->nama_karyawan }}</h3>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td scope="col">ID Karyawan</td>
                                <td scope="col">{{ $employee->id_karyawan }}</td>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $employee->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>    
                                    <td>No Handphone</td>
                                    <td>{{ $employee->no_telp }}</td>
                                </tr>
                                <tr>    
                                    <td>Gaji</td>
                                    <td>Rp { $employee->gaji }</td>
                                </tr>    
                                <tr>    
                                    <td>Data Dibuat</td>
                                    <td>Rp { $employee->created_at }</td>
                                </tr>    
                                <tr>    
                                    <td>Data diupdate</td>
                                    <td>Rp {!! $employee->updated_at !!}</td>
                                </tr>    
                            </tbody>
                          </table> 
                          <div class="p-3 my-3">
                          <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-md btn-primary">EDIT</a>
                          <a href="{{ route('employees.index') }}" class="btn btn-md btn-warning ">Kembali</a>
                        </div>
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