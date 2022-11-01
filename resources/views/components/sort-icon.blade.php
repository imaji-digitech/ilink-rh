@if ($sortField !== $field)
    <div class="float-end" style="opacity: 0.5"><i class="fa fa-long-arrow-down" style="margin-right: 0; width:5px"></i><i class="fa fa-long-arrow-up"></i> </div>
@elseif ($sortAsc)
    <div class="float-end"><i class="fa fa-long-arrow-down" style="opacity: 0.5; margin-right: 0; width:5px"></i><i class="fa fa-long-arrow-up"></i> </div>
@else
    <div class="float-end"><i class="fa fa-long-arrow-down" style="margin-right: 0; width:5px"></i><i class="fa fa-long-arrow-up" style="opacity: 0.5"></i> </div>
@endif
