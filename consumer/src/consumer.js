const axios = require('axios')

const baseUrl = `http://localhost:8001`;

const getPerson = async () => {
  return await axios.get(`${baseUrl}/api/v1/user/bankAccounts`);
}

module.exports = {
    getPerson,
};