<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;

class PropsReport implements FromView
{
    /**
     * The Props collection.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $hotels;

    public function __construct(Collection $hotels)
    {
        $this->hotels = $hotels;
    }

    public function view(): View
    {
        return view('app.props.exports.props', [
            'hotels' => $this->hotels
        ]);
    }
}
