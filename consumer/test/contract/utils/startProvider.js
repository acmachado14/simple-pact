const { Pact } = require("@pact-foundation/pact")
const path = require('path');

global.mockProvider = new Pact({
    consumer: 'frontend',
    provider: 'backend',
    port: 8001,
    log: path.resolve(process.cwd(), 'logs', 'pact.log'),
    dir: path.resolve(process.cwd(), 'pacts'),
    logLevel: 'INFO',
    spec: 2,
    cors: true,
    pactfileWriteMode: 'merge',
});
