<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;
use App\Review;
use App\Product;
use Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $reviews = $product->reviews;
        return ReviewResource::collection($reviews);
    }

    public function create_reviews(Request $request, $id)
    {
        $product = Product::find($id);  
        if ($product) 
        {
                $validator = Validator::make($request->all(), [
                'customer'   => 'required|string|min:5|max:15',
                'review'     => 'required|string|max:100',
                'star'       => 'required|numeric',
            ]);

            if ($validator->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'error validation request',
                    'data'    => $validator->errors(),
                ], 400);
            }
            else
            {
                $review = Review::create([
                    'product_id' => $product->id,
                    'customer'   => $request->customer,
                    'review'     => $request->review,
                    'star'       => $request->star,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'review created successfully', 
                    'data'    => [
                    'review'  => new ReviewResource($review),
                ]], 201);
            }
        }
        else
        {
            return response()->json([
                'error' => 'product not found'
            ], 404);
        }
    }

    public function view_specific_review($product_id, $review_id)
    {
        $review = Review::find($review_id);
        if ($review) 
        {
            return new ReviewResource($review);
        }
        else
        {
            return response()->json([
                'error' => 'review not found'
            ], 404);
        }
    }

    public function update_specific_review(Request $request, $review_id)
    {
        $review = Review::find($review_id);
        if ($review) 
        {
            $validator = Validator::make($request->all(), [
                'customer'   => 'required|string|min:5|max:15',
                'review'     => 'required|string|max:100',
                'star'       => 'required|numeric',
            ]);
            if ($validator->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'error validation request',
                    'data'    => $validator->errors(),
                ], 400);
            }
            else
            {
                $review->update($request->all());
                return response()->json([
                    'success' => true,
                    'message' => 'review updated successfully',
                    'data'    => [
                        'review' => new ReviewResource($review),
                    ]], 400);
            }
        }
        else
        {
            return response()->json([
                'error' => 'review not found'
            ], 404);
        }
    }

    public function delete_specific_review($review_id)
    {
        $review = Review::find($review_id);
        if ($review) 
        {
            $review->delete();
            return response()->json([
                    'success' => true,
                    'message' => 'review deleted successfully',
                    'data'    => $review,
                ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'review not found'
            ], 404);
        }
    }
}
