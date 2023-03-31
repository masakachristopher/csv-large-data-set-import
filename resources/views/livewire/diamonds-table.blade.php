<div>
    <div class="container ml-0">

        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <a href="{{ url('/') }}" class="mr-1"><span> <i>Go back</i></span></a>

            </div>
            <div class="col-md-12">
                <!-- Search box -->
                <input type="text" class="form-control mb-2" placeholder="Search" style="width: 250px;"
                    wire:model="searchTerm">
                <!-- Paginated records -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sort" wire:click="sortOrder('identifier')">Index {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('cut')">Cut {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('color')">Color {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('clarity')">Clarity {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('cut_quality')">Cut Quality {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('lab')">Lab {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('symmetry')">Symmetry {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('polish')">Polish {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('eye_clean')">Eye Clean {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('culet_size')">Culet Size {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('culet_condition')">Culet Condition {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('depth_percent')">Depth Percent {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('table_percent')">Table Percent {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('meas_length')">Meas Length {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('meas_width')">Meas Width {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('meas_depth')">Meas Depth {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('girdle_min')">Girdle Min {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('girdle_max')">Girdle Max {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('flour_color')">Flour Color {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('florr_intensity')">Flour Intensity {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('fancy_color_dominant_color')">Fancy Color Dominant Color {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('fancy_color_secondary_color')">Fancy Color Secondary Color{!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('fancy_color_overtone')">Fancy Color Overtone {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('fancy_color_intesity')">Fancy Color Intensity {!! $sortLink !!}</th>
                            <th class="sort" wire:click="sortOrder('total_sales')">Total Sales{!! $sortLink !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($diamonds->count())
                            @foreach ($diamonds as $diamond)
                                <tr>
                                    <td>{{ $diamond->identifier }}</td>
                                    <td>{{ $diamond->cut }}</td>
                                    <td>{{ $diamond->color }}</td>
                                    <td>{{ $diamond->clarity }}</td>
                                    <td>{{ $diamond->carat_weight }}</td>
                                    <td>{{ $diamond->cut_quality }}</td>
                                    <td>{{ $diamond->lab }}</td>
                                    <td>{{ $diamond->symmetry }}</td>
                                    <td>{{ $diamond->polish }}</td>
                                    <td>{{ $diamond->eye_clean }}</td>
                                    <td>{{ $diamond->culet_size }}</td>
                                    <td>{{ $diamond->culet_condition }}</td>
                                    <td>{{ $diamond->depth_percent }}</td>
                                    <td>{{ $diamond->table_percent }}</td>
                                    <td>{{ $diamond->meas_length }}</td>
                                    <td>{{ $diamond->meas_width }}</td>
                                    <td>{{ $diamond->meas_depth }}</td>
                                    <td>{{ $diamond->girdle_min }}</td>
                                    <td>{{ $diamond->girdle_max }}</td>
                                    <td>{{ $diamond->fancy_color_dominant_color }}</td>
                                    <td>{{ $diamond->fancy_color_secondary_color }}</td>
                                    <td>{{ $diamond->fancy_color_overtone }}</td>
                                    <td>{{ $diamond->fancy_color_intensity }}</td>
                                    <td>{{ $diamond->total_sales }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination navigation links -->
                {{ $diamonds->links() }}
            </div>

        </div>
    </div>

