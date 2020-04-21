@if(isset($ban))
    @if(!$ban->trashed())
        <a href="{{ route('banners.edit', [$ban->id]) }}" title="Edit Project"><i class="icon-pencil5 mr-1 icon-1x"></i></a>
        <a href="javascript:sdelete('banners/{{$ban->id}}')" title="Suspend User" class="delete-row delete-color" data-id="{{ $ban->id }}"><i class="icon-bin mr-3 icon-1x" style="color:red;"></i></a>
    @else
        <a href="javascript:restore('banners/restore/{{$ban->id}}')" title="Restore User" class="restore-row restore-color" data-id="{{ $ban->id }}"><i
                class="icon-loop3"></i></a>
        <a href="javascript:permanent('banners/deletePermanently/{{$ban->id}}')" title="Delete Permanently" class="delete-permanently-row delete-color" style="margin: 5px;" data-id="{{ $ban->id }}"><i
                class="icon-cancel-square2" style="color: red;"></i></a>
    @endif
@endif
