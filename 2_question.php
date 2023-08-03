<?php

use Illuminate\Support\Facades\DB;

class LgaResultController
{
  /**
   * This controller handles requests for LGA results.
   */

  public function index()
  {
    /**
     * Get the summed total result of all the polling units under any particular local government from the database.
     */
    $results = DB::table('polling_unit_results')
      ->select(DB::raw('SUM(results) as total_result'))
      ->groupBy('lga_id')
      ->get();

    /**
     * Render a view with the results.
     */
    return view('lga_result', [
      'results' => $results
    ]);
  }
}
