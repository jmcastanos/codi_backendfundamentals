from flask import Flask, jsonify

app = Flask(__name__)

#http://localhost/api/users
@app.route('/api/users', methods=['GET'])
def api():
    return jsonify({'users': [
        {'id': 1, 'name': 'Victor'},
        {'id': 2, 'name': 'Luis'},
        {'id': 3, 'name': 'Carlos'}
    ]})

if __name__ == '__main__':
    app.run(debug=True, port=5000)