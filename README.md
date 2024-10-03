# tag
Tag bags for storage

Database 
Users - id, identifier (id card number/studentid), name, email, username, password, role {student,admin,office)
StorageLocations - id, name, address, assigned_user_id
StorageUnits - id, name, storage_location_id, assigned_user_id
Inventory - id, location_id, description, color, photo, num_of_items
