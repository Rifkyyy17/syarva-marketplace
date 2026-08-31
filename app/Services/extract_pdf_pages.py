import sys
import os
import json
import warnings
warnings.filterwarnings('ignore')

try:
    import pymupdf
except ImportError:
    try:
        import fitz as pymupdf
    except ImportError:
        pymupdf = None

def main():
    if len(sys.argv) < 4:
        print(json.dumps({"error": "Invalid arguments"}))
        return

    pdf_path = sys.argv[1]
    out_dir = sys.argv[2]
    prefix = sys.argv[3]

    if not pymupdf:
        print(json.dumps({"error": "PyMuPDF not installed"}))
        return

    if not os.path.exists(pdf_path):
        print(json.dumps({"error": "PDF not found"}))
        return

    os.makedirs(out_dir, exist_ok=True)

    try:
        doc = pymupdf.open(pdf_path)
        results = []
        text_content = []

        # Read metadata title if available
        meta = doc.metadata or {}
        meta_title = meta.get('title', '') or meta.get('subject', '')
        if meta_title:
            text_content.append(meta_title)

        for i, page in enumerate(doc):
            if i < 8:
                pix = page.get_pixmap(dpi=150)
                filename = f"pdf_{prefix}_page_{i+1}.jpg"
                filepath = os.path.join(out_dir, filename)
                pix.save(filepath)
                rel_path = f"listings/{filename}"
                results.append({"path": rel_path, "filename": filename})

            # Extract raw text and block text
            raw_text = page.get_text() or ""
            text_content.append(raw_text)

        full_text = " ".join(text_content)[:15000]

        print(json.dumps({
            "images": results,
            "text": full_text
        }))
    except Exception as e:
        print(json.dumps({"error": str(e)}))

if __name__ == "__main__":
    main()
