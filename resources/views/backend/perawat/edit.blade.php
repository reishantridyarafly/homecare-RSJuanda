@extends('layouts.backend_main')
@section('title', 'Edit Perawat')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">@yield('title')</h4>
                </div>
                <form action="{{ route('perawat.update', $perawat->id) }}" method="post" id="form">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <input type="hidden" name="id" id="id" value="{{ $perawat->id }}">
                                        <input type="hidden" name="id_perawat" id="id_perawat"
                                            value="{{ $perawat->perawat->id }}">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" id="nip" name="nip" class="form-control"
                                            value="{{ $perawat->perawat->nip }}">
                                        <div class="invalid-feedback errorNIP">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ $perawat->name }}">
                                        <div class="invalid-feedback errorName">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="{{ $perawat->email }}">
                                                <div class="invalid-feedback errorEmail">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="no_telepon" class="form-label">No Telepon</label>
                                                <input type="number" id="no_telepon" name="no_telepon" class="form-control"
                                                    value="{{ $perawat->no_telepon }}">
                                                <div class="invalid-feedback errorNoTelepon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="gender">Jenis Kelamin</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="L" {{ $perawat->gender == 'L' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="P" {{ $perawat->gender == 'P' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback errorGender">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="gol_darah">Gol. Darah</label>
                                                <select name="gol_darah" id="gol_darah" class="form-control">
                                                    <option value="">-- Pilih Gol. Darah --</option>
                                                    <option value="A"
                                                        {{ $perawat->perawat->gol_darah == 'A' ? 'selected' : '' }}>A
                                                    </option>
                                                    <option value="B"
                                                        {{ $perawat->perawat->gol_darah == 'B' ? 'selected' : '' }}>B
                                                    </option>
                                                    <option value="AB"
                                                        {{ $perawat->perawat->gol_darah == 'AB' ? 'selected' : '' }}>AB
                                                    </option>
                                                    <option value="O"
                                                        {{ $perawat->perawat->gol_darah == 'O' ? 'selected' : '' }}>O
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback errorGolDarah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <label class="form-label" for="tempat_lahir">Tempat, Tanggal Lahir</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                    class="form-control" value="{{ $perawat->perawat->tempat_lahir }}">
                                                <div class="invalid-feedback errorTempatLahir">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                    class="form-control" value="{{ $perawat->perawat->tanggal_lahir }}">
                                                <div class="invalid-feedback errorTanggalLahir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea name="address" id="address" rows="1" class="form-control">{{ $perawat->address }}</textarea>
                                        <div class="invalid-feedback errorAddress">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="agama">Agama</label>
                                                <select name="agama" id="agama" class="form-control">
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="Islam"
                                                        {{ $perawat->perawat->agama == 'Islam' ? 'selected' : '' }}>Islam
                                                    </option>
                                                    <option value="Kristen"
                                                        {{ $perawat->perawat->agama == 'Kristen' ? 'selected' : '' }}>
                                                        Kristen</option>
                                                    <option value="Katolik"
                                                        {{ $perawat->perawat->agama == 'Katolik' ? 'selected' : '' }}>
                                                        Katolik</option>
                                                    <option value="Hindu"
                                                        {{ $perawat->perawat->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                                    </option>
                                                    <option value="Budha"
                                                        {{ $perawat->perawat->agama == 'Budha' ? 'selected' : '' }}>Budha
                                                    </option>
                                                    <option value="Konghucu"
                                                        {{ $perawat->perawat->agama == 'Konghucu' ? 'selected' : '' }}>
                                                        Konghucu</option>
                                                </select>
                                                <div class="invalid-feedback errorAgama">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="status_nikah">Status Nikah</label>
                                                <select name="status_nikah" id="status_nikah" class="form-control">
                                                    <option value="">-- Pilih Status Nikah --</option>
                                                    <option value="Belum Menikah"
                                                        {{ $perawat->perawat->status_nikah == 'Belum Menikah' ? 'selected' : '' }}>
                                                        Belum Menikah</option>
                                                    <option value="Menikah"
                                                        {{ $perawat->perawat->status_nikah == 'Menikah' ? 'selected' : '' }}>
                                                        Menikah</option>
                                                </select>
                                                <div class="invalid-feedback errorStatusNikah">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="jabatan">Jabatan</label>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                            <option value="">-- Pilih Jabatan --</option>
                                            @foreach ($jabatan as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $perawat->perawat->jabatan_id ? 'selected' : '' }}>
                                                    {{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback errorJabatan">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="jam_masuk">Jam Masuk</label>
                                                <input type="time" name="jam_masuk" id="jam_masuk"
                                                    class="form-control" value="{{ $perawat->perawat->jam_masuk }}">
                                                <div class="invalid-feedback errorJamMasuk">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="jam_pulang">Jam Pulang</label>
                                                <input type="time" name="jam_pulang" id="jam_pulang"
                                                    class="form-control" value="{{ $perawat->perawat->jam_pulang }}">
                                                <div class="invalid-feedback errorJamPulang">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" rows="1" class="form-control">{{ $perawat->perawat->deskripsi }}</textarea>
                                        <div class="invalid-feedback errorDeskripsi">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pilih Hari</label><br>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hari"
                                                name="hari[]" value="Senin"
                                                {{ in_array('Senin', $hari) ? 'checked' : '' }}>
                                            <label class="form-check-label">Senin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hari"
                                                name="hari[]" value="Selasa"
                                                {{ in_array('Selasa', $hari) ? 'checked' : '' }}>
                                            <label class="form-check-label">Selasa</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hari"
                                                name="hari[]" value="Rabu"
                                                {{ in_array('Rabu', $hari) ? 'checked' : '' }}>
                                            <label class="form-check-label">Rabu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hari"
                                                name="hari[]" value="Kamis"
                                                {{ in_array('Kamis', $hari) ? 'checked' : '' }}>
                                            <label class="form-check-label">Kamis</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hari"
                                                name="hari[]" value="Jumat"
                                                {{ in_array('Jumat', $hari) ? 'checked' : '' }}>
                                            <label class="form-check-label">Jumat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hari"
                                                name="hari[]" value="Sabtu"
                                                {{ in_array('Sabtu', $hari) ? 'checked' : '' }}>
                                            <label class="form-check-label">Sabtu</label>
                                        </div>
                                        <div class="text-danger errorHari text-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary mb-2"
                                    onclick="window.location='{{ route('perawat.index') }}'">Kembali</button>
                                <button type="submit" class="btn btn-primary mb-2" id="simpan">Simpan</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- end page title -->
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                let id = $('#id').val();

                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ url('perawat/"+id+"') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.nip) {
                                $('#nip').addClass('is-invalid');
                                $('.errorNIP').html(response.errors.nip);
                            } else {
                                $('#nip').removeClass('is-invalid');
                                $('.errorNIP').html('');
                            }

                            if (response.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(response.errors.name);
                            } else {
                                $('#name').removeClass('is-invalid');
                                $('.errorName').html('');
                            }

                            if (response.errors.email) {
                                $('#email').addClass('is-invalid');
                                $('.errorEmail').html(response.errors.email);
                            } else {
                                $('#email').removeClass('is-invalid');
                                $('.errorEmail').html('');
                            }

                            if (response.errors.no_telepon) {
                                $('#no_telepon').addClass('is-invalid');
                                $('.errorNoTelepon').html(response.errors.no_telepon);
                            } else {
                                $('#no_telepon').removeClass('is-invalid');
                                $('.errorNoTelepon').html('');
                            }

                            if (response.errors.jabatan) {
                                $('#jabatan').addClass('is-invalid');
                                $('.errorJabatan').html(response.errors.jabatan);
                            } else {
                                $('#jabatan').removeClass('is-invalid');
                                $('.errorJabatan').html('');
                            }

                            if (response.errors.jam_masuk) {
                                $('#jam_masuk').addClass('is-invalid');
                                $('.errorJamMasuk').html(response.errors.jam_masuk);
                            } else {
                                $('#jam_masuk').removeClass('is-invalid');
                                $('.errorJamMasuk').html('');
                            }

                            if (response.errors.jam_pulang) {
                                $('#jam_pulang').addClass('is-invalid');
                                $('.errorJamPulang').html(response.errors.jam_pulang);
                            } else {
                                $('#jam_pulang').removeClass('is-invalid');
                                $('.errorJamPulang').html('');
                            }

                            if (response.errors.deskripsi) {
                                $('#deskripsi').addClass('is-invalid');
                                $('.errorDeskripsi').html(response.errors.deskripsi);
                            } else {
                                $('#deskripsi').removeClass('is-invalid');
                                $('.errorDeskripsi').html('');
                            }

                            if (response.errors.hari) {
                                $('.errorHari').html(response.errors.hari);
                            } else {
                                $('.errorHari').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                            }).then(function() {
                                top.location.href = "{{ route('perawat.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
