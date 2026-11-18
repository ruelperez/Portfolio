<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use App\Http\Requests\Admin\PortfolioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::with('category')->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {

        $validated = $request->validated();

        if ($request->hasFile('image')) {

            $directory = public_path('storage/images/portfolios');

            // Create directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move($directory, $imageName);

            $validated['image'] = 'images/portfolios/' . $imageName;
        }


        Portfolio::create($validated);

        return to_route('admin.portfolio.index')->with('message', 'Portfolio Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();

        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PortfolioRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            $directory = public_path('storage/images/portfolios');

            // Create directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Delete the old image if it exists
            if (!empty($portfolio->image)) {
                $oldImage = public_path('storage/' . $portfolio->image);

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move($directory, $imageName);

            $validated['image'] = 'images/portfolios/' . $imageName;
        }

        $portfolio->update($validated);

        return to_route('admin.portfolio.index')
            ->with('message', 'Portfolio Updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete the image file if it exists
        if (!empty($portfolio->image)) {

            $imagePath = public_path('storage/' . $portfolio->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $portfolio->delete();

        return back()->with('message', 'Portfolio Deleted');
    }


    public function search(Request $request)
    {
        $searchedItem = $request->input('search');

        $portfolios = Portfolio::query()
            ->where('title', 'LIKE', "%{$searchedItem}%")
            ->orWhere('project_url', 'LIKE', "%{$searchedItem}%")
            ->get();

        return view('admin.portfolio.search', compact('portfolios'));
    }

}
