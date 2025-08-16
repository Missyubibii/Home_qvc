DELIMITER $$

CREATE TRIGGER trg_insert_product
AFTER INSERT ON idv_sell_product_store
FOR EACH ROW
BEGIN
    INSERT INTO products (
        id, name, slug, sku, brand_id, short_description, thumbnail, status, created_at, updated_at
    ) VALUES (
        NEW.id,
        NEW.proName,
        LOWER(REPLACE(NEW.proName, ' ', '-')),
        NEW.storeSKU,
        NEW.brandId,
        NEW.proSummary,
        NEW.proThum,
        'active',
        NOW(),
        NOW()
    );
END$$

CREATE TRIGGER trg_update_product
AFTER UPDATE ON idv_sell_product_store
FOR EACH ROW
BEGIN
    UPDATE products
    SET
        name = NEW.proName,
        slug = LOWER(REPLACE(NEW.proName, ' ', '-')),
        sku = NEW.storeSKU,
        brand_id = NEW.brandId,
        short_description = NEW.proSummary,
        thumbnail = NEW.proThum,
        updated_at = NOW()
    WHERE id = NEW.id;
END$$

CREATE TRIGGER trg_delete_product
AFTER DELETE ON idv_sell_product_store
FOR EACH ROW
BEGIN
    DELETE FROM products WHERE id = OLD.id;
END$$

DELIMITER ;
