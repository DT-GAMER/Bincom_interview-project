from flask import Flask, request
import sqlite3

# Connect to the database
conn = sqlite3.connect('database.db')

# Create the Flask app
app = Flask(__name__)

# Endpoint for displaying results for a polling unit
@app.route('/polling_unit_results')
def polling_unit_results():
    # Get the polling unit unique ID from the request parameters
    pu_uniqueid = request.args.get('pu_uniqueid')
    
    # Get the results for the polling unit from the database
    results = conn.execute('SELECT party_abbreviation, party_score FROM announced_pu_results WHERE polling_unit_uniqueid = ?', (pu_uniqueid,)).fetchall()
    
    # Format the results as a string
    result_str = f"Results for polling unit {pu_uniqueid}:<br>"
    for result in results:
        result_str += f"{result[0]}: {result[1]}<br>"
    
    # Return the results as HTML
    return f"<html><body>{result_str}</body></html>"

# Endpoint for displaying the summed total result of all the polling units under any particular local government
@app.route('/lga_results')
def lga_results():
    # Get the local government ID from the request parameters
    lga_id = request.args.get('lga_id')
    
    # Get the results for the local government from the database
    results = conn.execute('SELECT party_abbreviation, SUM(party_score) FROM announced_pu_results JOIN polling_unit ON announced_pu_results.polling_unit_uniqueid = polling_unit.uniqueid WHERE polling_unit.lga_id = ? GROUP BY party_abbreviation', (lga_id,)).fetchall()
    
    # Format the results as a string
    result_str = f"Results for local government {lga_id}:<br>"
    for result in results:
        result_str += f"{result[0]}: {result[1]}<br>"
    
    # Return the results as HTML
    return f"<html><body>{result_str}</body></html>"

# Endpoint for storing results for all parties for a new polling unit
@app.route('/new_polling_unit', methods=['POST'])
def new_polling_unit():
    # Get the polling unit details from the request parameters
    polling_unit_uniqueid = request.form['polling_unit_uniqueid']
    party_abbreviations = ['PDP', 'DPP', 'ACN', 'PPA', 'CDC', 'JP']
    party_scores = [request.form[party] for party in party_abbreviations]
    
    # Insert the results for the new polling unit into the database
    for i in range(len(party_abbreviations)):
        conn.execute('INSERT INTO announced_pu_results (polling_unit_uniqueid, party_abbreviation, party_score) VALUES (?, ?, ?)', (polling_unit_uniqueid, party_abbreviations[i], party_scores[i]))
    
    # Commit the changes to the database
    conn.commit()
    
    # Return a success message
    return "Results for new polling unit added successfully"

# Run the Flask app
if __name__ == '__main__':
    app.run(debug=True)