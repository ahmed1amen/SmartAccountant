<div class="table-responsive">

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th class="text-center">{{__('Models/EmployeeSalaryInfos.EmployeeID')}}</th>
            <th class="text-center">{{__('Models/EmployeeSalaryInfos.Allowances')}}</th>
            <th class="text-center">{{__('Models/EmployeeSalaryInfos.Deductions')}}</th>
            <th class="text-center">{{__('Models/EmployeeSalaryInfos.Description')}}</th>
            <th class="text-center">{{__('Models/EmployeeSalaryInfos.PresenceAndDevotion')}}</th>
            <th class="text-center">التاريخ</th>
            <th colspan="3">{{__('Buttons.Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($infos as $employeeSalaryInfo)
            <tr>
                <td class="text-center">{{ $employeeSalaryInfo->EmployeeID }}</td>

                <td class="text-center">{{ $employeeSalaryInfo->Allowances }}</td>

                <td class="text-center">{{ $employeeSalaryInfo->Deductions }}</td>

                <td class="text-center">{{ $employeeSalaryInfo->Description }}</td>
                
                <td class="text-center">
                    <form class="p-3" action="{{route('admin.employeeSalaryInfos.updatePresenceAndDevotion',$employeeSalaryInfo)}}" method="post">
                        @csrf
                        {{ method_field('POST') }}
                        <button type="submit" name="PresenceAndDevotion" value="Present" class="btn btn-primary">
                            {{ __('Models/EmployeeSalaryInfos.Present') }}
                        </button>
                        <button type="submit" name="PresenceAndDevotion" value="Late" class="btn btn-warning">
                            {{ __('Models/EmployeeSalaryInfos.Late') }}
                        </button>
                        <button type="submit" name="PresenceAndDevotion" value="Absent" class="btn btn-danger">
                            {{ __('Models/EmployeeSalaryInfos.Absent') }}
                        </button>
                    </form>
                </td>

                <td class="text-center">{{ $employeeSalaryInfo->created_at }}</td>

                <td>
                    <form action="{{route('admin.employeeSalaryInfos.destroy',$employeeSalaryInfo)}}" method="post">
                        @csrf
                        @method('delete')
                        <a class="btn btn-primary" href="{{route('admin.employeeSalaryInfos.edit',$employeeSalaryInfo)}}">{{__('General.Edit')}}</a>
                        <button type="submit" class="btn btn-danger">{{__('Buttons.Delete')}}</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>


    </table>
</div>

@push('styles')
<style>
    select option {
      margin: 40px;
      background: rgba(0, 0, 0, 0.3);
      color: #fff;
      text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    select option[value="Present"] {
      color: green;
    }

    select option[value="Late"] {
      color: blue;
    }

    select option[value="Absent"] {
      color: red;
    }
</style>
@endpush

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $("#PresenceAndDevotion").change(function(e){
                e.preventDefault();
                let selectedValue = $(this).children("option:selected").val();
                $.ajax({
                   type:'POST',
                    dataType: 'json',
                    'contentType': 'application/json',
                   url: '{{route('admin.employeeSalaryInfos.updatePresenceAndDevotion',$employeeSalaryInfo->id)}}',
                   data: JSON.stringify({
                            employeeSalaryInfo: {{ $employeeSalaryInfo->id }},
                            PresenceAndDevotion: selectedValue
                        }),
                   success:function(data){
                        swal.fire("PresenceAndDevotion", "Presence successfully Updated!", "success");
                   }

                });
            });
        });
    </script>
@endpush

