<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">முதல் - {{\Carbon\Carbon::parse($response['limits']['from'])->format('d/m/Y')}} வரை -{{\Carbon\Carbon::parse($response['limits']['to'])->format('d/m/Y')}} </h3>
            <div class="card-toolbar">
                <form action="{{route('viewfilter')}}" method="post">
                    @csrf
                <div class="mb-10">
                    <label for="" class="form-label">முதல்</label>
                    <input class="form-control" placeholder="Pick a date" id="kt_datepicker_1" name="startdate"/>
                </div>
                <div class="mb-10">
                    <label for="" class="form-label">வரை</label>
                    <input class="form-control" placeholder="Pick a date" id="kt_datepicker_2" name="enddate"/>
                </div>
                <div class="mb-10">
                    <button type="submit">காட்டு</button>
                </div>
            </form>
            </div>
        </div>
        <div class="card-body">
    <table id="kt_datatable_example_1" class="table table-row-bordered gy-5">
        <thead>
            <tr class="fw-bold fs-6 text-muted">
                <th>நாடு</th>
                <th>பார்வையாளர்கள்</th>
                <th>பார்வையிட்ட நேரம்</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($response['countries'] as $item)
            <tr>
                <td>{{$item['name']}}</td>
                <td>{{$item['unique_viewers']}}</td>
                <td>{{Carbon\Carbon::parse($item['viewing_time'])->format('H:i:s')}}</td>
                
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th>நாடு</th>
                <th>பார்வையாளர்கள்</th>
                <th>பார்வையிட்ட நேரம்</th>
               
            </tr>
        </tfoot>
    </table>
</div>

</div>

</x-app-layout>
<script src="assets/plugins/global/plugins.bundle.js"></script>

<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
    $("#kt_datepicker_1").flatpickr();

$("#kt_datepicker_2").flatpickr();
    $("#kt_datatable_example_1").DataTable();

</script>