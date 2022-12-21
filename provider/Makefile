build:
	@docker build -t acmachado/pact-provider:1.0 .
.PHONY: build

run-it:
	@docker run -it --rm --name provider --network contract-pact_default acmachado/pact-provider:1.0 php -S provider:8000
.PHONY: run-it

