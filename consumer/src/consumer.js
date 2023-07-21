const axios = require('axios')

const baseUrl = `http://127.0.0.1:8001`;

const getPerson = async (id) => {
  return await axios.get(`${baseUrl}/person/${id}`);
}

module.exports = {
    getPerson,
};