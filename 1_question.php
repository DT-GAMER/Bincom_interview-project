<?php

use Illuminate\Support\Facades\DB;

class PollingUnitResultController
{
  /**
   * This controller handles requests for polling unit results.
   */

  public function index($polling_unit_uniqueid)
  {
    /**
     * Get the polling unit result from the database.
     */
    $result = DB::table('polling_unit_results')
      ->where('polling_unit_uniqueid', $polling_unit_uniqueid)
      ->first();

    /**
     * If the result is found, render a view with the result.
     * Otherwise, redirect the user to the home page.
     */
    if ($result) {
      return view('polling_unit_result', [
        'result' => $result
      ]);
    } else {
      return redirect('/');
    }
  }
}
￼Enter
