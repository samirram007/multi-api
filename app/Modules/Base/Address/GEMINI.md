# Base/Address Module

This module provides reusable address management functionality used across various entities in the ERP system.

## Responsibilities
- Manage address structures (Street, City, State, Country, Zip/Postal Code).
- Support polymorphic relationships via addressable traits.

## Architectural Patterns
- **Models:** Uses `App\Modules\Base\Address\Models\Address`.
- **Relationships:** Entities requiring addresses should utilize the `App\Traits\HasPolymorphicResource` or relevant traits.
- **Enums:** Relies on `App\Enums\AddressType` for categorizing addresses (e.g., Shipping, Billing).

## Usage
To associate an address with a model, ensure the model implements the necessary interface and uses the `Addressable` trait (if defined within the module).

## Testing
- Feature tests are located in `app/Modules/Base/Address/Tests/`.
