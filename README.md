# Magento 2 Module: Category Filter for Admin Product Grid

This module extends the default Magento 2 Admin Product Grid to include a **Categories** column and a powerful **Category filter**. This makes it easy for administrators to view a product's assigned categories directly in the grid and efficiently filter the product list by one or more categories.

---

## 🚀 Features

* **Category Column:** Displays a comma-separated list of all assigned categories for each product.
* **Category Filter:** Adds a dropdown filter above the grid, allowing administrators to filter the product collection by selecting a single category.
* **Efficient Filtering:** Uses the native Magento collection filtering mechanism (`addCategoriesFilter`) for better performance when filtering large catalogs.
* **UI Component Integration:** Seamlessly integrates with the existing `product_listing.xml` UI Component configuration.

---

## 🛠️ Installation

### 1. Download and Place the Module

Create the directory `app/code/Rahulsingh/CategoryFilter` and place all the module files inside it.

### 2. Run Magento Commands

Execute the following commands from your Magento root directory:

```bash
# 1. Enable the module
php bin/magento module:enable Rahulsingh_CategoryFilter

# 2. Run setup upgrade to register the module and apply dependencies
php bin/magento setup:upgrade

# 3. Clean cache
php bin/magento cache:clean
````

### 3\. Verify

After running the commands, navigate to **Admin Panel** \> **Catalog** \> **Products**.

* You will see a new **Categories** column in the product grid.
* A new **Category** filter option will be available in the filter bar at the top of the grid.

-----

## 📝 Usage

1.  Navigate to **Catalog** \> **Products**.
2.  Click on the **Filters** button.
3.  Locate the **Category** dropdown, select the desired category, and click **Apply Filters**.
4.  The grid will now only show products assigned to the selected category.

-----

## 🤝 Contribution

Feel free to fork this repository, submit pull requests, or report any issues you encounter.
