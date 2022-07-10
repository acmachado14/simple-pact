"use strict"

const { expect } = require('chai')
const { Matchers } = require("@pact-foundation/pact")

const { getPerson } = require('../../src/consumer')

describe('API Pact test - Integration between \'backend\' and \'frontend\'', () => {
  describe("GET /person/:id", () => {
    const expectedBody = {
      first_name: 'Angelo',
      last_name: 'Machado',
      alias: 'gelin',
      age: 19,
    }

    before (async () => {
      await mockProvider.addInteraction({
        state: "i have person with id 1",
        uponReceiving: "a request for person with id 1",
        withRequest: {
          method: "GET",
          path: "/person/1",
          headers: {
            Accept: "application/json, text/plain, */*",
          },
        },
        willRespondWith: {
          status: 200,
          headers: {
            "Content-Type": "application/json; charset=utf-8",
          },
          body: Matchers.like(expectedBody),
        },
      })
    })

    it("returns correct body, header and statusCode", async () => {
      const response = await getPerson(1)
      expect(response.headers['content-type']).to.equal("application/json; charset=utf-8")
      expect(response.data).to.deep.equal(expectedBody)
      expect(response.status).to.equal(200)
    })
  })
})