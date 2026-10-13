@props(['tipe' => 'info'])

{{-- $attributes->merge menggabungkan atribut tambahan dari luar kelas CSS --}}
<div {{ $attributes->merge(['class' => "alert alert-$tipe"]) }} style="padding: 10px; border: 1px solid #ccc;">
    {{ $slot }}
</div>