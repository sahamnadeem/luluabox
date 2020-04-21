@if(isset($cat))
    @if(!$cat->trashed())
        <a href="{{ route('categories.edit', [$cat->id]) }}" title="Edit Project"><i class="icon-pencil5 mr-1 icon-1x"></i></a>
        <a href="javascript:sdelete('categories/{{$cat->id}}')" title="Suspend User" class="delete-row delete-color" data-id="{{ $cat->id }}"><i class="icon-bin mr-3 icon-1x" style="color:red;"></i></a>
    @else
        <a href="javascript:restore('categories/restore/{{$cat->id}}')" title="Restore User" class="restore-row restore-color" data-id="{{ $cat->id }}"><i
                class="icon-loop3"></i></a>
        <a href="javascript:permanent('categories/deletePermanently/{{$cat->id}}')" title="Delete Permanently" class="delete-permanently-row delete-color" style="margin: 5px;" data-id="{{ $cat->id }}"><i
                class="icon-cancel-square2" style="color: red;"></i></a>
    @endif
@endif
