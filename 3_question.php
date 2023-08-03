<?php

use Illuminate\Support\Facades\DB;

class PollingUnitResultStoreController
{
  /**
   * This controller handles requests for storing polling unit results.
   */

  public function store(Request $request)
  {
    /**
     * Create a dictionary containing the parties and results.
     */
    $data = $request->all();

    /**
     * Use the Laravel's `DB` facade to insert the data into the database.
     */
    DB::table('polling_unit_results')
      ->insert([
        'polling_unit_uniqueid' => $data['polling_unit_uniqueid'],
        'parties' => $data['parties'],
        'results' => $data['results']
      ]);

    /**
     * Redirect the user to the home page.
     */
    return redirect('/');
  }
}
